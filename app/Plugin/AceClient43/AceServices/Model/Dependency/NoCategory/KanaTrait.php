<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for フリガナ
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