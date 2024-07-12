<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 冷蔵
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasReizouInterface
{

    /**
     * Get 冷蔵
     *
     * @return int|null
     */
    public function getReizou(): ?int;

    /**
     * Set 冷蔵
     *
     * @param int|null $reizou
     * @return $this
     */
    public function setReizou(?int $reizou);

}