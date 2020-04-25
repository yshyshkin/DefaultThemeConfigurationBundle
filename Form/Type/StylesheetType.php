<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Url;

class StylesheetType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'url',
            TextType::class,
            [
                'constraints' => [new Url()]
            ]
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockPrefix()
    {
        return 'ystools_stylesheet';
    }
}
