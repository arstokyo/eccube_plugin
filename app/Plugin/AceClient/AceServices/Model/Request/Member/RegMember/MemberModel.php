<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelAbstract;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Class for MemberModel
 * 
 * @author kmorino
 */
class MemberModel extends PrmModelAbstract implements MemberModelInterface
{
  const PRM_NODE_NAME = 'member';

  /**
   * @var ?MemberPrmModelInterface $member
   */
  private ?MemberPrmModelInterface $member = null;

  /**
   * {@inheritDoc}
   */
  public function setMember(MemberPrmModelInterface $member): self
  {
      $this->member = $member;
      return $this;
  }

  /**
   * {@inheritDoc}
   */
  public function getMember(): MemberPrmModelInterface
  {
      return $this->member;
  }

  /**
   * {@inheritDoc}
   */
  public function ensureParameterNotMissing(): void
  {
     // not implemented yet
  }

  /**
   * {@inheritDoc}
   */
  public function fetchPrmNodeName(): string
  {
      return self::PRM_NODE_NAME;
  }
   
}