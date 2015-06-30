<?php

class Start extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Startseite';
        $data['products'] = $this->_model->all();
        $data['createOrEdit'] = 'Produkt hinzufügen';
        $data['url'] = '';
        
        $this->_view->render('header', $data);
        $this->_view->render('start/jumbotron', $data);
        $this->_view->render('start/carousel', $data);
        $this->_view->render('footer');
        
    }

}