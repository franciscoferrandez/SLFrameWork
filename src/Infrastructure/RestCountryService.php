<?php
class RestCountryService {
    private $api;
    private $base_url;
    private $mapper;
    function __construct () {
        $this->base_url = "https://restcountries.eu/rest/v2/";
        
        $this->api = new RestClient();
        $this->api->set_option('base_url', $this->base_url);
        
        global $mapper;
        $this->mapper = $mapper;
        
        /*
        $api = new RestClient([
            'base_url' => "https://api.twitter.com/1.1", 
            'format' => "json", 
            'headers' => ['Authorization' => 'Bearer '.OAUTH_BEARER], 
        ]);
        */
        
    }

    
    function all() {
        $result = $this->api->get("all");
        
        if($result->info->http_code == 200) {
            //return $this->iterateAndMapTo($result, CountryDTO::class);
            return $this->mapper->mapMultiple($result, CountryDTO::class);
        } else {
            die("Error " . $result->info->http_code);
        }
    }
    
    function getNames() {
        $result = $this->api->get("all", ["fields" => 'name']);
        
        if($result->info->http_code == 200) {
            return $this->mapper->mapMultiple($result, CountryNameDTO::class);
        } else {
            die("Error " . $result->info->http_code);
        }
    }
    
    
    function getByCode($code) {
        $result = $this->api->get("alpha/".$code);
        if($result->info->http_code == 200) {
            return $this->mapper->map($result->decode_response(), CountryDTO::class);
        } else {
            die("Error " . $result->info->http_code);
        }
    }
    
}


