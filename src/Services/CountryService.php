<?php
class CountryService {
    private $em;
    private $mapper;
    function __construct () {
        global $em;
        $this->em = $em;
        
        global $mapper;
        $this->mapper = $mapper;
    }

    
    function truncate() {
        try {
            $sql = 'TRUNCATE TABLE country';
            $stmt = $this->em->getConnection()->prepare($sql);
            $stmt->execute();            
        } catch (exception $e) {
            echo $e->getcode().'<hr>';
            echo $e->getmessage();
            return false;
        }
        return true;
    }
    
    function saveCountryCache() {
        $this->api = new RestCountryService();
        
        $result = $this->api->all();
        $result = $this->mapper->mapMultiple($result, Models\Country::class);

        if (count($result) > 0):
            $this->truncate();
        else:
            return false;
        endif;
        
        foreach ($result as $key => $country) {
            $this->em->persist($country);
            $this->em->flush();
        }
        
        return true;
    }
    
}


