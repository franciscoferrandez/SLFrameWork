<?php
// cli-config.php

error_reporting(0);

require_once __DIR__."/bootstrap.php";

//die(print_r($connectionParams,true));

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
