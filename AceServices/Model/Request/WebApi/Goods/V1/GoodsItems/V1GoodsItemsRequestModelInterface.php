<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItems;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

interface V1GoodsItemsRequestModelInterface extends RequestModelInterface
{
    public function getSyid(): int;

    public function setSyid(int $syid): self;

    /** @return string|null */
    public function getGdids(?string $separator = ','): ?string;

    /** @param string[]|null $gdids */
    public function setGdids(?array $gdids): self;

    public function getSkid(): ?int;

    public function setSkid(?int $skid): self;

    /** @return string|null */
    public function getFreeKubuns(?string $separator = ','): ?string;

    /** @param array<int, int>|null $freeKubuns */
    public function setFreeKubuns(?array $freeKubuns): self;
}
