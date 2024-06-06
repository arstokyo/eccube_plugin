<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuri;

use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Class OkuriModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class OkuriModel implements OkuriModelInterface
{
    use Haiso\OcodeTrait,
        Haiso\OnameTrait,
        Haiso\HcodeTrait,
        Haiso\HnameTrait,
        Good\JyouonTrait,
        Good\ReizouTrait,
        Good\ReitouTrait;

    /** @var ?int $kubun 代引区分 */
    protected ?int $kubun = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?int
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?int $kubun): static
    {
        $this->kubun = $kubun;
        return $this;
    }
}