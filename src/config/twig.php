<?php
$loader = new \Twig\Loader\FilesystemLoader(THEME_DIR);

global $twig;
$twig = new \Twig\Environment($loader, [
    //'cache' => __DIR__.'/../../cache',
    'cache' => false,
]);


$twig->addGlobal('_post', $_POST);
$twig->addGlobal('_get', $_GET);
//if (defined($_SESSION)) $twig->addGlobal('_session', $_SESSION);