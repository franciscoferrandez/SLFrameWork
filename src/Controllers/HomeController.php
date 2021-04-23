<?php
class HomeController {
    private $model;
    private $mapper;
    private $twig;
    
    function __construct( $viewModel )
    {
        $this->model = new $viewModel();
        
        global $mapper;
        $this->mapper = $mapper;
        
        global $twig;
        $this->twig = $twig;
    }
    public function index()
    {
        $template = $this->twig->load('dashboard.php');
        echo $template->render(['env' => $_ENV]);
        
        exit();
        
        header('location: /admin/dashboard');
        exit();
    }
    public function login()
    {
        include_once(THEME_DIR."login.php");
    }
    public function logout()
    {
        session_destroy();
        header('location: /login');
        exit();
    }
    
    public function phpinfo()
    {
        phpinfo();
        exit;
    }
}

