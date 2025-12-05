<?php

namespace Plugin\AceClient43\Form\Extension\Admin;

use Eccube\Form\Type\Admin\PaymentRegisterType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class PaymentRegisterExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ace_payment_id', IntegerType::class, [
            'label' => 'ace_client.admin.payment.label.ace_payment_id',
            'required' => false,
            'mapped' => true, // Entityに直接マッピング
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [PaymentRegisterType::class];
    }
}
