<?php

namespace Plugin\AceClient\AceServices;

class AceServiceAbstract implements AceServiceInterface {

    protected $servicename;
    protected $baseuri;

    public function __construct() {
        // read config 
        // $baseuri = configReader->Read();
    }

}
