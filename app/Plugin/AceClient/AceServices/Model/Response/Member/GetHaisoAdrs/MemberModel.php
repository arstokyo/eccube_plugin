<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseAbstract;
use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModel;
use Plugin\AceClient\AceServices\Model\Response\HandleResponseAsListTrait;

/**
 * Class MemberModel
 *
 * @author kmorino
 */

class MemberModel extends MemberModelResponseAbstract implements MemberModelInterface
{
    use HandleResponseAsListTrait;

    /**
     * GetHaisouAdrs
     *
     * @var GetHaisouAdrsModel[]|null $getHaisouAdrs
     */
    private ?array $getHaisouAdrs = null;


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
        $this->getHaisouAdrs = $this->handleResponseAsList($getHaisouAdrs, GetHaisouAdrsModel::class);
        return $this;
    }

}