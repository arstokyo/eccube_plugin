<?php

namespace Plugin\AceClient\Form\Type\Admin;

use Plugin\AceClient\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\component\Form\Extension\Core\Type\RadioType;
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
        $builder->add('base_uri', TextType::class, [
                      'constraints' => [
                       new NotBlank(),
                       new Length(['max' => 255]),
                      ],
                    ])
                ->add('is_log_on', RadioType::class, [
                      'choices' => [
                      'Yes' => true,
                      'No' => false,
                      ],
                      'expanded' => true,
                      'multiple' => false,
                      'constraints' => [
                       new NotBlank(),
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
