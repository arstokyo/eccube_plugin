<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;
use Symfony\Component\Serializer\Annotation\Ignore;

class AddCartResponseModel extends ResponseModelAbtract
{
    protected array $order;
    public function getOrder(): array
    {
        return $this->order;
    }

    public function setOrder(array $order): void
    {
        $this->order = $order;
    }
}