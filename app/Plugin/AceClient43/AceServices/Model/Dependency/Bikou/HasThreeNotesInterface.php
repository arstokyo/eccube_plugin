<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
/**
 * Interface for Has Three 納品書備考
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasThreeNotesInterface
{

    /**
    * Get 備考1
    *
    * @return string|null
    */
    public function getNote1(): ?string;
    /**
    * Set 備考1
    *
    * @param string|null $note1
    * @return $this
    */
    public function setNote1(?string $note1);
    /**
    * Get 備考2
    *
    * @return string|null
    */
    public function getNote2(): ?string;
    /**
    * Set 備考2
    *
    * @param string|null $note2
    * @return $this
    */
    public function setNote2(?string $note2);

    /**
    * Get 備考3
    *
    * @return string|null
    */
    public function getNote3(): ?string;
    /**
    * Set 備考3
    *
    * @param string|null $note3
    * @return $this
    */
    public function setNote3(?string $note3);
}