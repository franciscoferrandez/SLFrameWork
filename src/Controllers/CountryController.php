<?php
class CountryController {
    private $model;
    private $mapper;
    private $twig;
    
    function __construct( $viewModel )
    {
        if (class_exists($viewModel)) $this->model = new $viewModel();
        
        global $mapper;
        $this->mapper = $mapper;
        
        global $twig;
        $this->twig = $twig;
    }
    public function index() {
        $this->search();
    }
    public function search()
    {
        if ($this->model->getPostValue("searchCountryName")) {
            $offline = ( $this->model->getPostValue("searchOffline") ? true : false);
            $this->model->searchCountryName($this->model->getPostValue("searchCountryName"), $offline);
        }
        
        $template = $this->twig->load('country.search.php');
        echo $template->render(['env' => $_ENV, 'model' => $this->model]);
    }

}

