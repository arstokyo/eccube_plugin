<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\NmemberModel;

/**
 * Class MemberModel
 *
 * @author kmorino
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;
    
    /**
     * Point
     *
     * @var NmemberModel[]|null $Nmember
     */
    protected ?array $Nmember  = null;

    /**
     * {@inheritDoc}
     */
    function getNmember(): ?array
    {
        return $this->Nmember;
    }

    /**
    * {@inheritDoc}
    */
    function setNmember(?array $Nmember): void
    {
        $this->Nmember = $Nmember;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Nmember' => NmemberModel::class
        ];
    }
}