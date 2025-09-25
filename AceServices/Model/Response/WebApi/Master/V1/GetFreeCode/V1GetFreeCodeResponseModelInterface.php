<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Master\V1\GetFreeCode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasCountInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

interface V1GetFreeCodeResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface, HasCountInterface
{
    /**
     * @return V1GetFreeCodeItemModel[]
     */
    public function getItems(): array;

    /**
     * @param V1GetFreeCodeItemModel[] $items
     */
    public function setItems(array $items): static;
}
