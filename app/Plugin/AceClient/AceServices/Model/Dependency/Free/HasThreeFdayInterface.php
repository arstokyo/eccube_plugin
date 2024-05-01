<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリー日付
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFdayInterface
{
    /**
     * Get フリー日付1
     * 
     * @return int|null
     */
    public function getFday1(): ?int;

    /**
     * Set フリー日付1
     * 
     * @param int|null $fday
     */
    public function setFday1(?int $fday);

    /**
     * Get フリー日付2
     * 
     * @return int|null
     */
    public function getFday2(): ?int;

    /**
     * Set フリー日付2
     * 
     * @param int|null $fday2
     */
    public function setFday2(?int $fday2);

    /**
     * Get フリー日付3
     * 
     * @return int|null
     */
    public function getFday3(): ?int;

    /**
     * Set フリー日付3
     * 
     * @param int|null $fday3
     */
    public function setFday3(?int $fday3);

}