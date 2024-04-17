<?php

namespace Plugin\AceClient\AceService;

class AceServiceAbstract implements AceServiceInterface {

    protected $servicename;
    protected $baseuri;

    public function __construct() {
        // read config 
        // $baseuri = configReader->Read();
    }

}
