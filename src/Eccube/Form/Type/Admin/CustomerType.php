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

namespace Eccube\Form\Type\Admin;

use Eccube\Common\EccubeConfig;
use Eccube\Entity\Customer;
use Eccube\Form\Type\AddressType;
use Eccube\Form\Type\KanaType;
use Eccube\Form\Type\Master\CustomerStatusType;
use Eccube\Form\Type\Master\JobType;
use Eccube\Form\Type\Master\SexType;
use Eccube\Form\Type\NameType;
use Eccube\Form\Type\PhoneNumberType;
use Eccube\Form\Type\PostalType;
use Eccube\Form\Type\RepeatedPasswordType;
use Eccube\Form\Validator\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Customize\Form\Type\FmemoType;
use Customize\Entity\Fmemo;
use Customize\Form\Type\FcodeType;
use Customize\Entity\Fcode;
use Customize\Form\Type\FnameType;
use Customize\Entity\Fname;

class CustomerType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * CustomerType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(EccubeConfig $eccubeConfig)
    {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', NameType::class, [
                'required' => true,
            ])
            ->add('kana', KanaType::class, [
                'required' => true,
            ])
            ->add('company_name', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'max' => $this->eccubeConfig['eccube_stext_len'],
                    ]),
                ],
            ])
            ->add('postal_code', PostalType::class, [
                'required' => true,
            ])
            ->add('address', AddressType::class, [
                'required' => true,
            ])
            ->add('phone_number', PhoneNumberType::class, [
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Email(null, null, $this->eccubeConfig['eccube_rfc_email_check'] ? 'strict' : null),
                    new Assert\Length([
                        'max' => $this->eccubeConfig['eccube_email_len'],
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'common.mail_address_sample',
                ],
            ])
            ->add('sex', SexType::class, [
                'required' => false,
            ])
            ->add('job', JobType::class, [
                'required' => false,
            ])
            ->add('birth', BirthdayType::class, [
                'required' => false,
                'input' => 'datetime',
                'years' => range(date('Y'), date('Y') - $this->eccubeConfig['eccube_birth_max']),
                'widget' => 'single_text',
                'placeholder' => ['year' => '----', 'month' => '--', 'day' => '--'],
                'constraints' => [
                    new Assert\LessThanOrEqual([
                        'value' => date('Y-m-d', strtotime('-1 day')),
                        'message' => 'form_error.select_is_future_or_now_date',
                    ]),
                    new Assert\Range([
                        'min'=> '0003-01-01',
                        'minMessage' => 'form_error.out_of_range',
                    ]),
                ],
            ])
            ->add('plain_password', RepeatedPasswordType::class)
            ->add('status', CustomerStatusType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add(
                'point',
                NumberType::class,
                [
                    'required' => false,
                    'constraints' => [
                        new Assert\NotBlank(),
                        new Assert\Range([
                            'min' => "-".$this->eccubeConfig['eccube_price_max'],
                            'max' => $this->eccubeConfig['eccube_price_max']])
                    ],
                ]
            )
            ->add('fmemo1', FmemoType::class, [
                'choice_label' => 'fmemo',
                'required' => true,
                'placeholder' => 'common.select',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'form_error.not_selected',
                    ]),
                ]
            ])
            ->add('fmemo2', FmemoType::class, [
                'choice_label' => 'fmemo',
                'required' => false,
                'placeholder' => 'common.select',
            ])
            ->add('fmemo3', FmemoType::class, [
                'choice_label' => 'fmemo',
                'required' => false,
                'placeholder' => 'common.select',
            ])
            ->add('fday1', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
                'input' => 'datetime',
                'placeholder' => ['year' => '----', 'month' => '--', 'day' => '--'],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'form_error.not_selected',
                    ]),
                    new Assert\Range([
                        'min'=> '0003-01-01',
                        'minMessage' => 'form_error.out_of_range',
                    ]),
                ],
            ])
            ->add('fday2', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'placeholder' => ['year' => '----', 'month' => '--', 'day' => '--'],
                'constraints' => [
                    new Assert\Range([
                        'min'=> '0003-01-01',
                        'minMessage' => 'form_error.out_of_range',
                    ]),
                ],
            ])
            ->add('fday3', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'placeholder' => ['year' => '----', 'month' => '--', 'day' => '--'],
                'constraints' => [
                    new Assert\Range([
                        'min'=> '0003-01-01',
                        'minMessage' => 'form_error.out_of_range',
                    ]),
                ],
            ])
            ->add('free1', TextType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'max' => 12,
                        'maxMessage' => 'form_error.max_length_12',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'common.free',
                ],
            ])
            ->add('free2', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'max' => 12,
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'common.free',
                ],
            ])
            ->add('free3', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'max' => 12,
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'common.free',
                ],
            ])
            ->add('fcode1', FcodeType::class, [
                'choice_label' => 'fcode',
                'required' => true,
                'placeholder' => 'common.select',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'form_error.not_selected',
                    ]),
                ]
            ])
            ->add('fcode2', FcodeType::class, [
                'choice_label' => 'fcode',
                'required' => false,
                'placeholder' => 'common.select',
            ])
            ->add('fcode3', FcodeType::class, [
                'choice_label' => 'fcode',
                'required' => false,
                'placeholder' => 'common.select',
            ])
            ->add('fname1', FnameType::class, [
                'choice_label' => 'fname',
                'required' => true,
                'placeholder' => 'common.select',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'form_error.not_selected',
                    ]),
                ]
            ])
            ->add('fname2', FnameType::class, [
                'choice_label' => 'fname',
                'required' => false,
                'placeholder' => 'common.select',
            ])
            ->add('fname3', FnameType::class, [
                'choice_label' => 'fname',
                'required' => false,
                'placeholder' => 'common.select',
            ])
            ->add('note', TextareaType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'max' => $this->eccubeConfig['eccube_ltext_len'],
                    ]),
                ],
            ]);

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $form = $event->getForm();
            /** @var Customer $Customer */
            $Customer = $event->getData();
            if ($Customer->getPlainPassword() != '' && $Customer->getPlainPassword() == $Customer->getEmail()) {
                $form['plain_password']['first']->addError(new FormError(trans('common.password_eq_email')));
            }
        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $Customer = $event->getData();

            // ポイント数が入力されていない場合0を登録
            if (is_null($Customer->getPoint())) {
                $Customer->setPoint(0);
            }
        });
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Eccube\Entity\Customer',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'admin_customer';
    }
}
