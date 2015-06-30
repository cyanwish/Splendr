<?php

class User extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function registration() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
                isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) &&
                isset($_POST['passwordVal']) && strlen($_POST["password"]) >= '8') {
                
                $data['user']['firstname'] = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
                $data['user']['lastname'] = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
                $data['user']['email'] = trim($_POST['email']);
                $data['password'] = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
                $data['passwordVal'] = filter_var(trim($_POST['passwordVal']), FILTER_SANITIZE_STRING);
                
                if($this->_model->checkEmail($data['user']['email']) == '0') {
                    if($data['password'] == $data['passwordVal']) {
                        $activationCode = md5(uniqid(rand(), true));
                        $data['user']['activationCode'] = $activationCode;
                        $data['user']['activated'] = 0;
                    
                        $message = "Um deinen Account auf Splendr zu aktivieren, klinke auf den Link:\n\n http://localhost:8888/user/activate/?email=";
                        $message .= urlencode($data['user']['email']);
                        $message .= "&key=$activationCode";
                        mail($data['user']['email'], 'Bestätigung Ihrer Registrierung', $message);
                    
                        $data['user']['password'] = Password::hash($data['password']);
                        $this->_model->insertNewUser($data);
                        Message::set('Registrierung erfolgreich. Authentifizierungsmail wurde versendet.', 'info');
                        Url::redirect();
                    } else {
                        Message::set('Das eingebene Passwort stimmt nicht mit der Wiederholung überein.', 'danger');
                        Url::redirect();
                    }
                } else {
                    Message::set('Die angegebene E-Mail-Adresse ist bereits vergeben!', 'danger');
                    Url::redirect();
                }
            } else {
                Message::set('Ihre Eingabe war leider ungültig. (Passwort muss mindestens 8 Zeichen lang sein.)', 'danger');
                Url::redirect();
            }
        } else {
            Message::set('Registrierung fehlgeschlagen. Bitte erneut versuchen.', 'danger');
            Url::redirect();
        }
    }
    
    public function activate() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
            if (isset($_GET['email']) && isset($_GET['key']) && strlen($_GET['key']) == 32 &&
                filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
                
                $email = $_GET['email'];
                $activationCode = filter_var($_GET['key'], FILTER_SANITIZE_STRING);
                
                if($this->_model->checkActivationCode($activationCode, $email) == '1') {
                    
                    if($this->_model->checkIfActivated($email) == 0) {
                        $this->_model->tagAccountActivated($email);  
                        Message::set('Der Account wurde erfolgreich aktiviert! Sie können sich nun einloggen.', 'info');
                        Url::redirect('start');
                    }
                    else {
                        Message::set('Der Account wurde bereits aktiviert!', 'danger');
                        Url::redirect('start');
                    }
                }
                else {
                    Message::set('Angegebener Aktivierungscode oder E-Mail-Adresse unbekannt.', 'danger');
                    Url::redirect('start');
                }   
            }
            else {
                Message::set('Ungültiger Aktivierungslink.', 'danger');
                Url::redirect('start');
            }
        }
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['location']) &&
                filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                
                $data['email'] = trim($_POST['email']);
                $data['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                $data['url'] = filter_var($_POST['location'], FILTER_SANITIZE_URL);
                
                if(isset($_POST['keepLogged'])) {
                    $data['keepLogged'] = $_POST['keepLogged'];
                } else {
                    $data['keepLogged'] = false;
                }
                if (!empty($data['email']) && !empty($data['password'])) {
                    if($this->_model->checkIfActivated($data['email']) == 1) {
                        if(Password::validate($data['password'], $this->_model->getPassword($data['email']))) {
                            
                            Session::init();
                            $_SESSION['email'] = $data['email']; 
                            $email = $data['email'];
                            Message::set("Login von $email erfolgreich.", 'info');
                            Url::redirect($data['url']); 
                            
                        } else {
                            Message::set('Bitte überprüfen Sie ihr eingegebenes Passwort.', 'info');
                            Url::redirect($data['url']); 
                        }
                    } else {
                        Message::set('Es existiert kein Account mit dieser E-Mail-Adresse oder Sie haben Ihren Account noch nicht aktiviert.', 'info');
                        Url::redirect($data['url']);  
                    }   
                } else {
                    Message::set('Sie haben vergessen, entweder ihre E-Mail-Adresse oder ihr Passwort einzugeben.', 'info');
                    Url::redirect($data['url']);
                }
            } else {
                Message::set('Fehler beim Login.', 'danger');
                Url::redirect();
            }
        } else {
            Message::set('Fehler beim Login.', 'danger');
            Url::redirect();
        }
    }

    public function logout() {
        Session::clear('email');
        Session::destroy();
        Message::set('Sie haben sich erfolgreich ausgeloggt.');
        Url::redirect();
    }

}