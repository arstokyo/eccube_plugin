<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリーメモ
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFmemoInterface
{
    /**
     * Get メモ1
     * 
     * @return ?string
     */
    public function getFMemo1(): ?string;

    /**
     * Set メモ1
     * 
     * @param ?string $fmemo1
     */
    public function setFMemo1(?string $fmemo1);

    /**
     * Get メモ2
     * 
     * @return ?string
     */
    public function getFMemo2(): ?string;

    /**
     * Set メモ2
     * 
     * @param ?string $fmemo2
     */
    public function setFMemo2(?string $fmemo2);

    /**
     * Get メモ3
     * 
     * @return ?string
     */
    public function getFMemo3(): ?string;

    /**
     * Set メモ3
     * 
     * @param ?string $fmemo3
     */
    public function setFMemo3(?string $fmemo3);
}