<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Kana
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait KanaTrait
{
    /** @var ?string $kana フリガナ*/
    protected ?string $kana = null;

    /**
     * {@inheritDoc}
     */
    public function getKana(): ?string
    {
        return $this->kana;
    }

    /**
     * {@inheritDoc}
     */
    public function setKana(?string $kana)
    {
        $this->kana = $kana;
        return $this;
    }

}