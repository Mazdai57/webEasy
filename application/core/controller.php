<?php

class Controller {
    
    private $model;
    private $view;
    
    function __construct() {
        $this->view = new View();
    }
    
    function action_index() {
    }
    
    public function getModel () {
        return $this->model;
    }
    
    public function getView () {
        return $this->view;
    }
}

