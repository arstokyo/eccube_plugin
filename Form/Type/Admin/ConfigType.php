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

namespace Plugin\AceClient43\Form\Type\Admin;

use Eccube\Form\Type\ToggleSwitchType;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\Constants\TransactionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('base_uri', TextType::class,
            [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ],
            ])
                ->add('is_log_on', ToggleSwitchType::class)
                ->add('syid', TextType::class, [
                    'constraints' => [
                        new NotBlank(),
                        new Length(['max' => 1]),
                    ],
                ])
                ->add('order_route_id', IntegerType::class, [
                    'label' => '注文ルートID',
                    'required' => false,
                ])
                ->add('use_ace_delivery', ToggleSwitchType::class, ['label' => '配送手数料連携'])
                ->add('use_ace_discount', ToggleSwitchType::class, ['label' => '割引連携'])
                ->add('use_ace_charge', ToggleSwitchType::class, ['label' => '手数料連携'])

                ->add('add_point_from_ace', ToggleSwitchType::class, [
                    'label' => 'ACEポイント反映',
                ])
                ->add('enable_order_support_cart', ToggleSwitchType::class, ['label' => '受注サポート(カート)'])
                ->add('enable_order_support_check_out', ToggleSwitchType::class, ['label' => '受注サポート(購入)'])
                ->add('add_cart_index', ToggleSwitchType::class, ['label' => 'カート追加連携(一覧)'])
                ->add('add_cart_shopping', ToggleSwitchType::class, ['label' => 'カート追加連携(購入)'])
                ->add('validate_duplicate_entry', ToggleSwitchType::class, ['label' => '会員重複チェック(フロント)'])
                ->add('validate_duplicate_admin_entry', ToggleSwitchType::class, ['label' => '会員重複チェック(管理画面)'])
                ->add('redirect_forgot', ToggleSwitchType::class, ['label' => 'パスワード忘れリダイレクト'])
                ->add('forgot_path', TextType::class, [
                    'label' => 'リダイレクト先パス',
                    'required' => false,
                    'empty_data' => '',
                ])
                ->add('default_payment_id', IntegerType::class, ['label' => 'デフォルト決済ID'])
                ->add('default_transaction_type', ChoiceType::class, [
                    'label' => 'デフォルト取引区分',
                    'choices' => [
                        '都度決済' => TransactionType::SINGLE_PAYMENT,
                        '掛け払い' => TransactionType::CREDIT_PAYMENT,
                        'カード払い' => TransactionType::CARD_PAYMENT,
                    ],
                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Config::class,
        ]);
    }
}
