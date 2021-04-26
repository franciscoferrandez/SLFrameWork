<?php

    $loader = require_once(__DIR__."/vendor/autoload.php");
    $loader->add("", 'src/Controllers/rest');
    $loader->add("", 'src/ViewModels/base');
    $loader->add("", 'src/ViewModels/');
    $loader->add("", 'src/Models/');
    $loader->add("", 'src/Services/base/');
    $loader->add("", 'src/Services/');
    $loader->add("", 'src/Infrastructure/');
    $loader->add("", 'src/Dtos/');
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
    
    include_once(__DIR__."/src/config/autoload.php");
