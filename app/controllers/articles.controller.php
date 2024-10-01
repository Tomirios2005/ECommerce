<?php
require_once "./app/Models/Articles.model.php";
require_once "./app/views/Articles.view.php";

class ArticlesController{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new ArticleModel;
        $this->view=new ArticlesView;

    }
    public function showArticles(){
        $articles=$this->model->getArticles();
        return $this->view->showArticles($articles);
    }
    

}
