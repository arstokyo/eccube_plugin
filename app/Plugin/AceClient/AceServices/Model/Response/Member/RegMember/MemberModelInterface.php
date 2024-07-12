<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/*
 * Interface for Member Model
 * 
 * @author kmorino
 */
interface MemberModelInterface extends HasMessageModelInterface
{
    /**
     * Get Nmem
     * 
     * @return Response\Member\RegMember\JmemModel|null
     */
    public function getJmember(): ?JmemModel;

    /**
     * Set Nmem
     * 
     * @param Response\Member\RegMember\JmemModel|null $jmember
     * @return self
     */
    public function setJmember(?JmemModel $jmember): self;

    /**
     * Get Nmem
     * 
     * @return Response\Member\RegMember\NmemModel|null
     */
    public function getNmember(): ?NmemModel;

    /**
     * Set Nmem
     * 
     * @param Response\Member\RegMember\NmemModel|null $nmember
     * @return self
     */
    public function setNmember(?NmemModel $nmember): self;

    /**
     * Get Nmem
     * 
     * @return Response\Member\RegMember\SmemModel|null
     */
    public function getSmember(): ?SmemModel;

    /**
     * Set Nmem
     * 
     * @param Response\Member\RegMember\SmemModel|null $smember
     * @return self
     */
    public function setSmember(?SmemModel $smember): self;

}
