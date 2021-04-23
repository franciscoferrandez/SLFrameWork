<?php

    $loader = require_once(__DIR__."/vendor/autoload.php");
    $loader->add("", 'src/ViewModels/');
    $loader->add("", 'src/Services/');
    $loader->add("", 'src/Infrastructure/');
    $loader->add("", 'src/Dtos/');
    $loader->add("", 'src/Models/');
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
    
    include_once(__DIR__."/src/config/autoload.php");
