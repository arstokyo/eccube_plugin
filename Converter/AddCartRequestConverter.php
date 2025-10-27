<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Entity\Config;

class AddCartRequestConverter implements AddCartRequestConverterInterface
{
    use CreateRequestModelTrait;

    private ?AddCartFlow $flow = null;

    /**
     * フローを設定
     *
     * @param AddCartFlow $flow
     *
     * @return self
     */
    public function setFlow(AddCartFlow $flow): self
    {
        $this->flow = $flow;

        return $this;
    }

    /**
     * 現在のフローを取得
     *
     * @return AddCartFlow|null
     */
    public function getFlow(): ?AddCartFlow
    {
        return $this->flow;
    }

    /**
     * Build MemberOrderModel from customer and address
     */
    public function buildMemberOrderModel(
        Customer $customer,
        ?CustomerAddress $customerAddress,
        array $options = [],
    ): RequestAddCart\MemberOrderModelInterface {
        /** @var RequestAddCart\MemberOrderModelInterface $memberOrderModel */
        $memberOrderModel = $this->createSubModel(RequestAddCart\MemberOrderModelInterface::class);

        /** @var RequestAddCart\JmemberModel $jmember */
        $jmember = $this->createSubModel(RequestAddCart\JmemberModel::class);
        $jmember->setCode($customer->getAceCustomerId());

        /** @var RequestAddCart\SmemberModel $smember */
        $smember = $this->createSubModel(RequestAddCart\SmemberModel::class);
        $smember->setCode($customer->getAceCustomerId());

        $memberOrderModel
            ->setJmember($jmember)
            ->setSmember($smember);

        if ($customerAddress !== null) {
            /** @var RequestAddCart\NmemberModel $nmember */
            $nmember = $this->createSubModel(RequestAddCart\NmemberModel::class);
            $nmember->setEda($customerAddress->getAceEdaNo());
            $memberOrderModel->setNmember($nmember);
        }

        return $memberOrderModel;
    }

    /**
     * Build JyudenModel with common fields
     */
    public function buildJyudenModel(
        string $transactionId,
        string $paymentId,
        bool $isOrderSupportEnabled,
        Config $config,
        array $options = [],
    ): RequestAddCart\JyudenModelInterface {
        /** @var RequestAddCart\JyudenModelInterface $jyuden */
        $jyuden = $this->createSubModel(RequestAddCart\JyudenModelInterface::class);

        $jyuden
            ->setTorikbn($transactionId)
            ->setPcode($paymentId);

        if ($config->hasOrderRouteId()) {
            $jyuden->setJcode($config->getOrderRouteId());
        }

        if ($isOrderSupportEnabled) {
            $jyuden->useCampaign();
        }

        return $jyuden;
    }

    /**
     * Build OptionsModel with common settings
     */
    public function buildOptionsModel(
        array $options = [],
    ): RequestAddCart\OptionsModelInterface {
        /** @var RequestAddCart\OptionsModelInterface $optionsModel */
        $optionsModel = $this->createSubModel(RequestAddCart\OptionsModelInterface::class);
        //  // Common settings that both CartBridge and OrderBridge use
        //  $optionsModel
        //      ->setGroupSupport(true)
        //      ->setCalcSupportMode(RequestAddCart\OptionsModelInterface::CALC_SUPPORT_MODE_ALL)
        //      ->setReturnPlannedShippingDay(true)
        //      ->setReturnSpGiveKbns([RequestAddCart\OptionsModelInterface::SUPPORT_POINT_GIVE_KBN]);
        return $optionsModel;
    }

    /**
     * Apply common order totals to JyudenModel
     */
    public function applyOrderTotals(
        RequestAddCart\JyudenModelInterface $jyuden,
        float $charge,
        float $discount,
        float $deliveryFee,
        Config $config,
        array $options = [],
    ): void {
        if ($charge > 0) {
            $jyuden->setTesuu($charge);
        }

        if ($discount < 0) {
            $jyuden->setNebiki($discount);
        }

        if ($deliveryFee > 0) {
            $jyuden->setSouryou($deliveryFee);
        }
    }

    /**
     * Build JyudenFree models from array
     */
    public function buildJyudenFreeModels(array $freeMap): array
    {
        $models = [];
        foreach ($freeMap as $fmkbn => $free) {
            if ($free === null || $free === '') {
                continue;
            }
            $models[] = $this->buildJyudenFreeModel($fmkbn, (string) $free);
        }

        return $models;
    }

    protected function buildJyudenFreeModel(int $fmkbn, string $free): RequestAddCart\JyudenFreeModelInterface
    {
        /** @var RequestAddCart\JyudenFreeModelInterface $model */
        $model = $this->createSubModel(RequestAddCart\JyudenFreeModelInterface::class);

        return $model->setFmkbn($fmkbn)
            ->setFree($free);
    }
}
