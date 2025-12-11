<?php

namespace Plugin\AceClient43\Converter\Traits;

use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;

trait CreateJyudenFreeModelTrait
{
    /**
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    protected function createJyudenFreeModel(int $fmkbn, string $free): RequestAddCart\JyudenFreeModelInterface
    {
        /** @var RequestAddCart\JyudenFreeModelInterface $model */
        $model = $this->createSubModel(RequestAddCart\JyudenFreeModelInterface::class);

        return $model->setFmkbn($fmkbn)
            ->setFree($free);
    }
}
