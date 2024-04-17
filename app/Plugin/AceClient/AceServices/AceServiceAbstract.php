<?php

namespace Plugin\AceClient\AceServices;

class AceServiceAbstract implements AceServiceInterface {

    protected string $servicename;
    protected string $baseuri;

    public function __construct() {
        // read config 
        // $baseuri = configReader->Read();
    }

}
