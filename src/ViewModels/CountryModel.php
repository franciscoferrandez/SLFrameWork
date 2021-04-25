<?php
class CountryModel extends HttpBaseModel
{
    public $countries = false;
    public $source = "";
    
    function __construct(){
        parent::__construct();
    }
    
    function searchCountryName($name, $offline = false) {
        $api = new CountryService();

        // obtenemos los paises online de forma predeterminada, salvo indicacion expresa
        if (!$offline) {
            $this->countries = $api->searchCountryNameFromRemote($name);
            if ($this->countries) $this->source = "online";
        }

        // si obtuvimos error o se pidio offline
        if (!$this->countries) {
            $this->countries = $api->searchCountryName($name);
            if ($this->countries) $this->source = "offline";
        }

        return $this;
    }
}