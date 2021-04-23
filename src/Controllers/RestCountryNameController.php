<?php
class RestCountryNameController {
    private $model;
    private $svc;
    private $countryApi;
    function __construct(  )
    {
        $this->countryApi = new RestCountryService();
        $this->svc = new CountryNameService();
    }
    private function returnJsonData($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function all()
    {
        $this->returnJsonData($this->countryApi->getNames());
    }
    
    
    public function import() {
        if ($this->svc->saveCountryNameCache()):
            http_response_code(200);
        else:
            http_response_code(400);
        endif;
    }
}