<?php
class ArticleModel{
    private $db;
    public function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=db_ecommerce;charset=utf8", 'root', '');
    }

     
    public function getArticles() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM articles');
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $articles = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $articles;
    }
 
    public function getArticle($id) {    
        $query = $this->db->prepare('SELECT * FROM articles WHERE id = ?');
        $query->execute([$id]);   
    
        $article = $query->fetch(PDO::FETCH_OBJ);
    
        return $article;
    }
 
    public function insertArticle( $name, $price, $description, $stock) { 
        $query = $this->db->prepare('INSERT INTO articles(name, price, description, stock) VALUES (?, ?, ?,?)');
        $query->execute([$name, $price, $description,$stock]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseArticle($id) {
        $query = $this->db->prepare('DELETE FROM articles WHERE id = ?');
        $query->execute([$id]);
    }

    public function updateArticle($id) {        
        $query = $this->db->prepare('UPDATE articles SET stock = stock-1 1 WHERE id = ?');
        $query->execute([$id]);
    }
}