<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Master\V1\GetFreeCode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\KubunTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\SyidTrait;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\Util\Converter\ListConverter;

class V1GetFreeCodeRequestMode implements V1GetFreeCodeRequestModelInterface
{
    use SyidTrait;
    use KubunTrait;

    protected array $freeCodes = [];

    public function getCodes(): string
    {
        return ListConverter::arrayToString($this->freeCodes);
    }

    public function setCodes(array $codes): self
    {
        $this->freeCodes = $codes;

        return $this;
    }

    public function ensureParameterNotMissing(): void
    {
        if ($this->syid <= 0) {
            throw new MissingRequestParameterException('syid');
        }
        if (empty($this->kubun)) {
            throw new MissingRequestParameterException('kubun');
        }
    }

    public function fetchRequestNodeName(): string
    {
        return '';
    }
}
