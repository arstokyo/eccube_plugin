<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PrmModelRequestInterface;

/**
 * Interface RegMemAdrRequestInterface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface RegMemAdrRequestInterface extends RequestModelInterface
{
   /**
    * Get SystemID
    *
    * @return int
    */
    public function getId(): int;

    /**
     * Set SystemID
     *
     * @param int $id
     * @return RegMemAdrRequestInterface
     */
    public function setId(int $id): RegMemAdrRequestInterface;

    /**
     * Get Prm
     *
     * @return PrmModelRequestInterface
     */
    public function getPrm(): PrmModelRequestInterface;

    /**
     * Set Prm
     *
     * @param PrmModelRequestInterface $prm
     * @return RegMemAdrRequestInterface
     */
    public function setPrm(PrmModelRequestInterface $prm): RegMemAdrRequestInterface;

}