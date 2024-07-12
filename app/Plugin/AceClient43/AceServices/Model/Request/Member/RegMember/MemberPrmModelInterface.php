<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;
use Plugin\AceClient43\AceServices\Model\Request;

/**
 * Interface Member Order Model
 * 
 * @author kmorino
 */
interface MemberPrmModelInterface extends PrmModelInterface
{
    /**
     * Get 受注先
     * 
     * @return Request\Member\RegMember\JmemberModel|null
     */
    public function getJmember(): ?JmemberModelInterface;

    /**
     * Set 受注先
     * 
     * @param Request\Member\RegMember\JmemberModel|null $jmember
     * @return self
     */
    public function setJmember(?JmemberModelInterface $jmember): self;
    
    /**
     * Get 納品先
     * 
     * @return Request\Member\RegMember\NmemberModelInterface|null
     */
    public function getNmember(): ?NmemberModelInterface;

    /**
     * Set 納品先
     * 
     * @param Request\Member\RegMember\NmemberModel|null $nmember
     * @return self
     */
    public function setNmember(?NmemberModelInterface $nmember): self;
    
    /**
     * Get 請求先
     * 
     * @return Request\Member\RegMember\SmemberModelInterface|null
     */
    public function getSmember(): ?SmemberModelInterface;

    /**
     * Set 請求先
     * 
     * @param Request\Member\RegMember\SmemberModel|null $smember
     * @return self
     */
    public function setSmember(?SmemberModelInterface $smember): self;

}