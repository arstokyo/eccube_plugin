<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModel;

/**
 * Class MemberModel
 *
 * @author kmorino
 */

class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

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
    * {@inheritDoc}s
    */
    public function setGetHaisouAdrs(array|null $haisouAdrs): self
    {
        $this->getHaisouAdrs = $haisouAdrs;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return ['getHaisouAdrs' => GetHaisouAdrsModel::class];
    }

}