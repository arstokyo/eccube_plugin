<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItemsTanka;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

interface V1GoodsItemsTankaRequestModelInterface extends RequestModelInterface
{
    public function getSyid(): int;

    public function setSyid(int $syid): self;

    public function getGdids(?string $separator = ','): ?string;

    public function setGdids(?array $gdids): self;

    public function getSkid(): ?int;

    public function setSkid(?int $skid): self;

    public function getFreeKubuns(?string $separator = ','): ?string;

    public function setFreeKubuns(?array $freeKubuns): self;

    public function getTankaKubuns(): ?string;

    public function setTankaKubuns(?array $tankaKubuns): self;

    public function getExtraFields(): ?string;

    public function setExtraFields(?array $extraFields): self;
}
