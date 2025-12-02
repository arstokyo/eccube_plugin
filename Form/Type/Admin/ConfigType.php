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
                    'required' => false,
                ])
                ->add('use_ace_delivery', ToggleSwitchType::class)
                ->add('use_ace_discount', ToggleSwitchType::class)
                ->add('use_ace_charge', ToggleSwitchType::class)

                ->add('add_point_from_ace', ToggleSwitchType::class)
                ->add('enable_order_support_cart', ToggleSwitchType::class)
                ->add('enable_order_support_check_out', ToggleSwitchType::class)
                ->add('add_cart_index', ToggleSwitchType::class)
                ->add('add_cart_shopping', ToggleSwitchType::class)
                ->add('validate_duplicate_entry', ToggleSwitchType::class)
                ->add('validate_duplicate_admin_entry', ToggleSwitchType::class)
                ->add('redirect_forgot', ToggleSwitchType::class)
                ->add('forgot_path', TextType::class, [
                    'required' => false,
                    'empty_data' => '',
                ])
                ->add('default_payment_id', IntegerType::class)
                ->add('default_transaction_type', ChoiceType::class, [
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
