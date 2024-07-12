<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 受注方法コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasJcodeInterface
{
   
    /**
     * Get 受注方法コード
     *
     * @return ?int
     */
    public function getJcode() : ?int;

    /**
     * Set 受注方法コード
     *
     * @param ?int $jcode
     * @return $this
     */
    public function setJcode(?int $jcode);

}