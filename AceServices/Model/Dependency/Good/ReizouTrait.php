<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Trait for 冷蔵
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ReizouTrait
{

    /** @var ?int $reizou 冷蔵 */
    protected ?int $reizou = null;

    /**
     * {@inheritDoc}
     */
    public function getReizou(): ?int
    {
        return $this->reizou;
    }

    /**
     * {@inheritDoc}
     */
    public function setReizou(?int $reizou)
    {
        $this->reizou = $reizou;
        return $this;
    }

}