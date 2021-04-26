<?php
    use App\ViewModel;

    // Create a Router
    $router = new \Bramus\Router\Router();

    // Custom 404 Handler
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    });

    // Before Router Middleware
    $router->before('GET', '/.*', function () {
        header('X-Powered-By: bramus/router');
    });


    $router->all('/rest', function () use ($router) {
        $router->trigger404();
    });
  
  
    $router->all('/rest/(\w+)/(\w+)/(\w+)', function ($entity, $method, $value) use ($router) {
        try {
            $controllerName = "Rest".$entity."Controller";
            if (!class_exists($controllerName)) $router->trigger404();

            $controller = new $controllerName();
            if (method_exists($controller,$method)) {
                $controller->$method($value);
            } else {
                $router->trigger404();
            }
        } catch (Exception $e) {
            die($e->getMessage());
            $router->trigger404();
        }
    });
    
    $router->all('/rest/(\w+)/(\w+)', function ($entity, $method) use ($router) {
        try {
            $controllerName = "Rest".$entity."Controller";
            if (!class_exists($controllerName)) $router->trigger404();

            $controller = new $controllerName();
            if (method_exists($controller,$method)) {
                $controller->$method();
            } else {
                $router->trigger404();
            }
        } catch (Exception $e) {
            die($e->getMessage());
            $router->trigger404();
        }
    });
    
    
    $router->all('/rest/(\w+)', function ($method) use ($router) {
        $controller = new RestController("RestModel");
        if (method_exists($controller,$method)) {
            $controller->$method();
        } else {
            $router->trigger404();
        }
    });
    
 
     // Static route: / (homepage)
    $router->get('/', function () {
        $controller = new HomeController("HomeModel");
        $controller->index();
    });
    
    
    $router->get('/(\w+)', function ($method) use ($router) {
        $controller = new HomeController("HomeModel");
        if (method_exists($controller,$method)) {
            $controller->$method();
        } else {
            $router->trigger404();
        }
    });
    
    $router->all('/(\w+)/(\w+)', function ($entity, $method) use ($router) {
        try {
            $controllerName = $entity."Controller";
            if (!class_exists($controllerName)) $router->trigger404();

            $controller = new $controllerName($entity."Model");
            if (method_exists($controller,$method)) {
                $controller->$method();
            } else {
                $router->trigger404();
            }
        } catch (Exception $e) {
            die($e->getMessage());
            $router->trigger404();
        }
    });

    
    $router->before('GET|POST', '/admin/.*', function() {
        if (!isset($_SESSION['user'])) {
            //header('location: /login');
            //exit();
        }
    });

    // Static route: /dashboard
    $router->get('/admin/dashboard', function () {
        include_once(THEME_DIR."dashboard.php");
    });
    
    $router->post('/login', function () {
        $_SESSION['user'] = $_POST["email"];
        header('location: /admin/dashboard');
        exit();
    });


    // Thunderbirds are go!
    $router->run();