<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

class PostClientAbstract extends AbstractClient implements PostClientInterface
{
    protected string $requestmethod = 'POST';
}