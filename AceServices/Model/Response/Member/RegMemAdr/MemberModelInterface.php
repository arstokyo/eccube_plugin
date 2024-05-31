<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/*
 * Interface for Member Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface
{
    /**
     * Get Nmem
     * 
     * @return Response\Member\RegMemAdr\NmemModel|null
     */
    public function getNmember(): ?NmemModel;

    /**
     * Set Nmem
     * 
     * @param Response\Member\RegMemAdr\NmemModel|null $nmember
     * @return self
     */
    public function setNmember(?NmemModel $nmember): self;

}
