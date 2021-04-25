<?php
class HttpBaseModel
{
    protected $model;
    protected $mapper;
    
    protected $post = array();
    protected $get = array();
    
    function __construct(){
        global $mapper;
        $this->mapper = $mapper;
        
        global $twig;
        $this->twig = $twig;

        if (!empty($_POST)) $this->post = $_POST;
        if (!empty($_GET)) $this->get = $_GET;
    }

    function isPost() {
        return empty($this->post);
    }

    function isGet() {
        return empty($this->get);
    }

    function getPostValue($key) {
        if (array_key_exists($key, $this->post)) {
            return $this->post[$key];
        } else {
            return null;
        }
    }

    function getGetValue($key) {
        if (array_key_exists($key, $this->get)) {
            return $this->get[$key];
        } else {
            return null;
        }
    }

}