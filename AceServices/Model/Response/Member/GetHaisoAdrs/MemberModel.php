<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseAbstract;
use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModel;

/**
 * Class MemberModel
 *
 * @author kmorino
 */

class MemberModel extends MemberModelResponseAbstract implements MemberModelInterface
{
    /**
     * Point
     *
     * @var GetHaisouAdrsModel $getHaisouAdrs
     */
    protected ?GetHaisouAdrsModel $getHaisouAdrs = null;


    /**
     * {@inheritDoc}
     */
    function getGetHaisouAdrs(): ?GetHaisouAdrsModel
    {
        return $this->getHaisouAdrs;
    }

    /**
    * {@inheritDoc}
    */
    function setGetHaisouAdrs(?GetHaisouAdrsModel $getHaisouAdrs): void
    {
        $this->getHaisouAdrs = $getHaisouAdrs;
    }
}