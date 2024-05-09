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
     * @var GetHaisouAdrsModel[]|null $getHaisouAdrs
     */
    protected ?array $getHaisouAdrs = null;


    /**
     * {@inheritDoc}
     */
    public function getGetHaisouAdrs(): ?array
    {
        return $this->getHaisouAdrs;
    }

    /**
    * {@inheritDoc}
    */
    public function setGetHaisouAdrs(array|null $getHaisouAdrs): self
    {
        if ($getHaisouAdrs && \array_key_exists('@diffgr:id', $getHaisouAdrs) && !\current($getHaisouAdrs) instanceof GetHaisouAdrsModel) {
            $getHaisouAdrs = [$getHaisouAdrs];
        }
        $this->getHaisouAdrs = $getHaisouAdrs;
        return $this;
    }

}