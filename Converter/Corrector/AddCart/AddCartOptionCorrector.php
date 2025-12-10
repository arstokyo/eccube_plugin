<?php

namespace Plugin\AceClient43\Converter\Corrector\AddCart;

use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OptionsModelInterface;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;

/**
 * お届け予定日の返却とグループサポートを設定
 */
class AddCartOptionCorrector implements AddCartRequestCorrectorInterface
{
    use CreateRequestModelTrait;

    /**
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    public function correct(AddCartRequestModelInterface $request, AddCartFlow $flow, array $context, array $options = []): void
    {
        $optionModels = $request->getPrm()->getOptions() ?? $this->createSubModel(OptionsModelInterface::class);
        $optionModels->setReturnPlannedShippingDay(true);

        // 受注サポートが有効のみ、グループ設定
        if ($request->getPrm()->getJyuden()->isUseCampaign()) {
            $optionModels->setGroupSupport(true);
        }

        $request->getPrm()->setOptions($optionModels);
    }

    public function supports(AddCartFlow $flow): bool
    {
        return $flow->isCartAdd() || $flow->isShoppingAdd();
    }
}
