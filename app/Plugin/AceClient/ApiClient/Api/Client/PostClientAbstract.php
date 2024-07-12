<?php

namespace Plugin\AceClient43\ApiClient\Api\Client;

class PostClientAbstract extends AbstractClient implements PostClientInterface
{
    protected string $requestmethod = 'POST';
}