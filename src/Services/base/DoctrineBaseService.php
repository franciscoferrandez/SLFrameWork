<?php
class DoctrineBaseService {
    protected $em;
    protected $mapper;
    function __construct () {
        global $em;
        $this->em = $em;
        
        global $mapper;
        $this->mapper = $mapper;
    }
   
 
}


