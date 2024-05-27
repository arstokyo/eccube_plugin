<?php

namespace Plugin\AceClient\Form\Type\Admin;

use Plugin\AceClient\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
                ->add('is_log_on', ChoiceType::class,
                      [
                        'choices' => [
                          '有効' => true,
                          '無効' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
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
