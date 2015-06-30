<?php

class User_Model extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function insertNewUser($data) {
        $this->_db->insert('user', $data['user']);
    }
    
     public function checkEmail($email) {
        $email = '\'' . $email . '\'';
        $result = $this->_db->select("SELECT count(*) FROM user WHERE email = $email");
        return $result[0]['count(*)'];
    }
    
    public function checkActivationCode($activationCode, $email) {
        $email = '\'' . $email . '\'';
        $activationCode = '\'' . $activationCode . '\'' ;
        $result = $this->_db->select("SELECT count(*) FROM user WHERE activationCode = $activationCode AND email = $email");
        return $result[0]['count(*)'];
    }
    
    public function checkIfActivated($email) {
        $email = '\'' . $email . '\'';
        $result = $this->_db->select("SELECT activated FROM user WHERE email = $email");
        return $result[0]['activated'];
    }
    
    public function tagAccountActivated($email) {
        $email = '\'' . $email . '\'';
        $data['activated'] = 1;
        $this->_db->update('user', $data, "email = $email");
    }
    
    public function getPassword($email) {
        $email = '\'' . $email . '\'';
        $result = $this->_db->select("SELECT password FROM user WHERE email = $email");
        return $result[0]['password'];
    }
}