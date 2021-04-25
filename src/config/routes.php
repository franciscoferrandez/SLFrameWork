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
        //die("rest");
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

    
    // Static route: /hello
    $router->get('/hello', function () {
        echo '<h1>bramus/router</h1><p>Visit <code>/hello/<em>name</em></code> to get your Hello World mojo on!</p>';
    });

    // Dynamic route: /hello/name
    $router->get('/hello/(\w+)', function ($name) {
        echo 'Hello ' . htmlentities($name);
    });

    // Dynamic route: /ohai/name/in/parts
    $router->get('/ohai/(.*)', function ($url) {
        echo 'Ohai ' . htmlentities($url);
    });

    // Dynamic route with (successive) optional subpatterns: /blog(/year(/month(/day(/slug))))
    $router->get('/blog(/\d{4}(/\d{2}(/\d{2}(/[a-z0-9_-]+)?)?)?)?', function ($year = null, $month = null, $day = null, $slug = null) {
        if (!$year) {
            echo 'Blog overview';

            return;
        }
        if (!$month) {
            echo 'Blog year overview (' . $year . ')';

            return;
        }
        if (!$day) {
            echo 'Blog month overview (' . $year . '-' . $month . ')';

            return;
        }
        if (!$slug) {
            echo 'Blog day overview (' . $year . '-' . $month . '-' . $day . ')';

            return;
        }
        echo 'Blogpost ' . htmlentities($slug) . ' detail (' . $year . '-' . $month . '-' . $day . ')';
    });

    // Subrouting
    $router->mount('/movies', function () use ($router) {

        // will result in '/movies'
        $router->get('/', function () {
            echo 'movies overview';
        });

        // will result in '/movies'
        $router->post('/', function () {
            echo 'add movie';
        });

        // will result in '/movies/id'
        $router->get('/(\d+)', function ($id) {
            echo 'movie id ' . htmlentities($id);
        });

        // will result in '/movies/id'
        $router->put('/(\d+)', function ($id) {
            echo 'Update movie id ' . htmlentities($id);
        });
    });

    // Thunderbirds are go!
    $router->run();