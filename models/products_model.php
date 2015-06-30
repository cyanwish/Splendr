<?php

class Products_Model extends Model {

    public function __construct(){
        parent::__construct();
    }

    /**
    * Gibt die letzten 20 Einträge im Archiv zurück.
    * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
    */
    public function all() {
        return $this->_db->select('SELECT * FROM products ORDER BY id DESC LIMIT 0, 20');
    }
    
    public function insert($data) {
        $this->_db->insert('products', $data['product']);
    }
    
    public function update($data)
    {
        $id = $data['product']['id'];
        $this->_db->update('products', $data['product'], "id = $id");
    }
    
    public function delete($id) {
        $this->_db->delete('products', "id = $id", 1);
    }
    
    public function getProduct($id) {
        return $this->_db->select("SELECT * FROM products WHERE id = $id");
    }
    
    public function getProductsFromBoard($board) {
        $board = '\'' . $board . '\'';
        return $this->_db->select("SELECT * FROM products WHERE board = $board");
    }
    
    public function search($pattern) {
        $pattern = "'%" . $pattern . "%'";
        return $this->_db->select('SELECT * FROM products WHERE (name LIKE' . $pattern . 'OR url LIKE' . $pattern . ') OR (name LIKE ' . $pattern . 'AND url LIKE '  . $pattern . ')');
    }
    
}