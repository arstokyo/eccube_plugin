<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has Id
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasIdInterface
{
    /**
    * Get 通販プロID
    *
    * @return int
    */
    public function getId():int;
    /**
     * Set 通販プロID
     *
     * @param int $id
     */
    public function setId(int $id);

}