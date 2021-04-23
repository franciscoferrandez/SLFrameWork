<?php
class RestController {
    private $model;
    private $countryApi;
    function __construct( $viewModel )
    {
        //$tihs->model = new $viewModel;
        $this->countryApi = new RestCountryService();
    }
    private function returnJsonData($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
    
    
    // obsoletas ..................................
    public function countryAll()
    {
        $this->returnJsonData($this->countryApi->all());
    }
    public function getCountryNames()
    {
        $this->returnJsonData($this->countryApi->getNames());
    }
}