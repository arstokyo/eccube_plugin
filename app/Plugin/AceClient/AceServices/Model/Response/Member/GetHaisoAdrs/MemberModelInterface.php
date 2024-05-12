<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface MemberModelInterface
 *
 * @author kmorino
 */

interface MemberModelInterface extends HasMessageModelInterface
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
     * @return self
     */
    public function setGetHaisouAdrs(array|null $getHaisouAdrs): self;
}