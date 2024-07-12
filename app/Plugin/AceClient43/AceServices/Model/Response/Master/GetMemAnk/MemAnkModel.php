<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemAnk;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class MemAnkModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemAnkModel implements MemAnkModelInterface
{
    use NoCategory\MbidTrait,
        NoCategory\KubunTrait;

    /** @var ?int $ansno 回答番号 */
    protected ?int $ansno = null;

    /** @var ?string $ansid アンケートID */
    protected ?string $ansid = null;

    /**
     * {@inheritDoc}
     */
    public function getAnsno(): ?int
    {
        return $this->ansno;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnsno(?int $ansno)
    {
        $this->ansno = $ansno;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnsid(): ?string
    {
        return $this->ansid;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnsid(?string $ansid)
    {
        $this->ansid = $ansid;
        return $this;
    }
}
