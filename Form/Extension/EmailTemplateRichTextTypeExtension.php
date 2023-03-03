<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle\Form\Extension;

use Oro\Bundle\EmailBundle\Form\Type\EmailTemplateRichTextType;
use Oro\Bundle\FormBundle\Form\Type\OroRichTextType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailTemplateRichTextTypeExtension extends AbstractTypeExtension
{
    public static function getExtendedTypes(): iterable
    {
        return [EmailTemplateRichTextType::class];
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setNormalizer(
            'wysiwyg_options',
            function (Options $options, $wysiwygOptions) {
                $wysiwygOptions['toolbar'] = OroRichTextType::$toolbars[OroRichTextType::TOOLBAR_DEFAULT][0] . ' code';
                return $wysiwygOptions;
            }
        );
    }
}
