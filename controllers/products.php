<?php

class Products extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Produkte';
        $data['products'] = $this->_model->all();
        $data['createOrEdit'] = 'Produkt hinzufügen';
        $data['url'] = 'products';

        $this->_view->render('header', $data);
        $this->_view->render('products/list', $data);
        $this->_view->render('footer');
    }
    
    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (isset($_POST['name']) && isset($_POST['url']) && isset($_POST['image']) &&
                isset($_POST['price']) && isset($_POST['board'])) {
            
                $data['product']['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $data['product']['url'] = filter_var($_POST['url'], FILTER_SANITIZE_URL);
                $data['product']['image'] = filter_var($_POST['image'], FILTER_SANITIZE_URL);
                $data['product']['price'] = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
                $data['product']['board'] = filter_var($_POST['board'], FILTER_SANITIZE_STRING);
                
                $this->_model->insert($data);
                Message::set('Produkt wurde erfolgreich hinzugefügt.', 'info');
                Url::redirect('products/recommend/?board=' . $data['product']['board']);
            } else {
                Message::set('Fehler beim Hinzufügen des Produkts.', 'danger');
                Url::redirect('products');
            }    
        } else
            Message::set('Fehler beim Absenden des Formulars.', 'danger');
            Url::redirect();
    }
    
    public function edit($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $data['title'] = 'Produkte';
        $data['products'] = $this->_model->all();
        $data['createOrEdit'] = 'Produkt bearbeiten';
        $data['url'] = 'products';
        $data['product'] = $this->_model->getProduct($id);
        
        $this->_view->render('header', $data);
        $this->_view->render('products/list', $data);
        $this->_view->render('footer');
        $this->_view->render('products/editModalCall');
    }
    
    public function doEdit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (isset($_POST['name']) && isset($_POST['url']) && isset($_POST['image']) &&
                isset($_POST['price']) && isset($_POST['board'])) {
                
                $data['product']['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $data['product']['url'] = filter_var($_POST['url'], FILTER_SANITIZE_URL);
                $data['product']['image'] = filter_var($_POST['image'], FILTER_SANITIZE_URL);
                $data['product']['price'] = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
                $data['product']['board'] = filter_var($_POST['board'], FILTER_SANITIZE_STRING);
                $data['product']['id'] = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

                $this->_model->update($data);
                Message::set('Produkt wurde erfolgreich bearbeitet.', 'info');
                Url::redirect('products');
            } else {
                Message::set('Fehler beim Bearbeiten des Produkts.', 'danger');
                Url::redirect('products');
            }
        } else {
            Message::set('Fehler beim Absenden des Formulars.', 'danger');
            Url::redirect();
        }
    }
    
    public function delete($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $this->_model->delete($id);
        Message::set('Produkt wurde erfolgreich gelöscht.', 'info');
        Url::redirect('products');
    }
    
    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET['q'])) {
                
                $data['search'] = filter_var($_GET['q'], FILTER_SANITIZE_STRING);
                $pattern = $data['search'];
        
                $data['title'] = 'Suche';
                $data['url'] = "products/search/?q=$pattern";
                $data['search'] = $this->_model->search($pattern);
                
                $this->_view->render('header', $data);
                $this->_view->render('products/search', $data);
                $this->_view->render('footer');
                
            } else {
                Message::set('Fehler bei der Suche nach den gewünschten Produkten.', 'danger');
                Url::redirect();
            }
        } else {
            Message::set('Fehler bei der Suche.', 'danger');
            Url::redirect();
        }
    }
    
    public function recommend() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET['board'])) {
                
                $data['board'] = filter_var($_GET['board'], FILTER_SANITIZE_STRING);
                $data['title'] = 'Empfehlungen';
                $data['url'] = 'products/recommend/?board=' . $data['board'];
                $data['recommend'] = $this->_model->getProductsFromBoard($data['board']);
                
                $this->_view->render('header', $data);
                $this->_view->render('products/recommend', $data);
                $this->_view->render('footer');
                
            } else {
                Message::set('Fehler bei der Empfehlung zu gewünschten Produkten. Das tut uns Leid.', 'danger');
                Url::redirect();
            }
        } else {
            Message::set('Fehler beim Empfehlen. Das tut uns Leid.', 'danger');
            Url::redirect();
        }
    }
    
}