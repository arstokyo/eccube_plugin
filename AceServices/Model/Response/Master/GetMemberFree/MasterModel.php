<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFree;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * MemberFree
     *
     * @var MemberFreeModel[]|null $memberFree
     */
    protected ?array $memberFree  = null;

    /**
     * {@inheritDoc}
     */
    function getMemberFree(): ?array
    {
        return $this->memberFree;
    }

    /**
    * {@inheritDoc}
    */
    function setMemberFree(?array $memberFree): void
    {
        $this->memberFree = $memberFree;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'MemberFree' => MemberFreeModel::class
               ];
    }
}