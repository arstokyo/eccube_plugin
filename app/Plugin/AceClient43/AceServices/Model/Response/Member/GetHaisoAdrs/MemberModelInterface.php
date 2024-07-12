<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface MemberModelInterface
 *
 * @author kmorinos
 */

interface MemberModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
    * Get GetHaisouAdrs
    *
    * @return Response\Member\GetHaisoAdrs\GetHaisouAdrsModel[]|null
    */
    public function getGetHaisouAdrs(): ?array;

    /**
     * Set GetHaisouAdrs
     *
     * @param Response\Member\GetHaisoAdrs\GetHaisouAdrsModel[]|null $getHaisouAdrs
     * @return void
     */
    public function setGetHaisouAdrs(?array $getHaisouAdrs): void;
}