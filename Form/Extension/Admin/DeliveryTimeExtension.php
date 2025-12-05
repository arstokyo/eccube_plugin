<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Form\Extension\Admin;

use Eccube\Form\Type\Admin\DeliveryTimeType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class DeliveryTimeExtension extends AbstractTypeExtension
{
    /**
     * フォームにACE配送時間帯IDフィールドを追加
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ace_delivery_time_id', IntegerType::class, [
            'label' => 'ACE時間帯ID',
            'required' => false,
            'mapped' => true,
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [DeliveryTimeType::class];
    }
}
