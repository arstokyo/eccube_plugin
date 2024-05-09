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
    * @return ?Response\Member\GetHaisoAdrs\GetHaisouAdrsModel
    */
    public function getGetHaisouAdrs(): ?GetHaisouAdrsModel;

    /**
     * Set Point
     *
     * @param ?Response\Member\GetHaisoAdrs\GetHaisouAdrsModel $getHaisouAdrs
     * @return void
     */
    public function setGetHaisouAdrs(?GetHaisouAdrsModel $getHaisouAdrs): void;
}