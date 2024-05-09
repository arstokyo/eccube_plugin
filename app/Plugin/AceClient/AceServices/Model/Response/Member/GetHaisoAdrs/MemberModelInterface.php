<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseInterface as ParentMemberModelResponseInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModel;
use Plugin\AceClient\AceServices\Model\Response;


/**
 * Interface MemberModelInterface
 *
 * @author kmorino
 */

interface MemberModelInterface extends ParentMemberModelResponseInterface
{
    /**
    * Get Point
    *
    * @return Response\Member\GetHaisoAdrs\GetHaisouAdrsModel[]|null
    */
    public function getGetHaisouAdrs(): ?array;

    /**
     * Set Point
     *
     * @param Response\Member\GetHaisoAdrs\GetHaisouAdrsModel[]|null $getHaisouAdrs
     * @return self
     */
    public function setGetHaisouAdrs(array|null $getHaisouAdrs): self;
}