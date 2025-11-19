<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItems;

use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\Util\Converter\ListConverter;

class V1GoodsItemsRequestModel implements V1GoodsItemsRequestModelInterface
{
    protected int $syid = 0;

    /** @var string[]|null */
    protected ?array $gdids = null;

    protected ?int $skid = null;

    /** @var array<int, int>|null */
    protected ?array $freeKubuns = null;

    protected ?array $tankaKubuns = null;

    public function getSyid(): int
    {
        return $this->syid;
    }

    public function setSyid(int $syid): self
    {
        $this->syid = $syid;

        return $this;
    }

    public function getGdids(?string $separator = ','): ?string
    {
        return ListConverter::arrayToString($this->gdids, $separator);
    }

    public function setGdids(?array $gdids): self
    {
        $this->gdids = $gdids;

        return $this;
    }

    public function getSkid(): ?int
    {
        return $this->skid;
    }

    public function setSkid(?int $skid): self
    {
        $this->skid = $skid;

        return $this;
    }

    public function getFreeKubuns(?string $separator = ','): ?string
    {
        return ListConverter::arrayToString($this->freeKubuns, $separator);
    }

    public function setFreeKubuns(?array $freeKubuns): self
    {
        $this->freeKubuns = $freeKubuns;

        return $this;
    }

    public function getTankaKubuns(): ?string
    {
        return ListConverter::arrayToString($this->tankaKubuns);
    }

    public function setTankaKubuns(?array $tankaKubuns): self
    {
        $this->tankaKubuns = $tankaKubuns;

        return $this;
    }

    public function fetchRequestNodeName(): string
    {
        return 'GetGoodsList';
    }

    public function ensureParameterNotMissing(): void
    {
        if (empty($this->syid)) {
            throw new MissingRequestParameterException('syid');
        }
        if (empty($this->gdids)) {
            throw new MissingRequestParameterException('gdids');
        }
    }
}
