<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

interface CheckCodeAndMailResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface
{
    /**
     * @return ItemModel[]
     */
    public function getItems(): array;

    /**
     * @param ItemModel[] $items
     *
     * @return self
     */
    public function setItems(array $items): self;

    public function getTotalHit(): int;

    public function setTotalHit(int $totalHit): self;
}
