<?php

namespace Plugin\AceClient43\Converter\Traits;

use Customize\Enum\CustomerFreeCode;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;

trait CreateJmemFreeModelTrait
{
    /**
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    private function createJmemFreeModel(CustomerFreeCode $freeCode, ?string $value): RegMember\JmemFreeModelInterface
    {
        return $this->createSubModel(RegMember\JmemFreeModelInterface::class)
            ->setKubun($freeCode->value)
            ->setFree($value);
    }
}
