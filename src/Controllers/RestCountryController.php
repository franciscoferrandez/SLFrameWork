<?php
class RestCountryController {
    private $model;
    private $svc;
    private $countryApi;
    function __construct(  )
    {
        $this->countryApi = new RestCountryService();
        $this->svc = new CountryService();
    }
    private function returnJsonData($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function all()
    {
        $this->returnJsonData($this->countryApi->all());
    }
    public function names()
    {
        $this->returnJsonData($this->countryApi->getNames());
    }
    public function code($code)
    {
        $this->returnJsonData($this->countryApi->getByCode($code));
    }
    
    
    
    public function import() {
        if ($this->svc->saveCountryCache()):
            http_response_code(200);
        else:
            http_response_code(400);
        endif;
    }
}