<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle\DependencyInjection;

use Oro\Bundle\ConfigBundle\DependencyInjection\SettingsBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(YsToolsDefaultThemeConfigurationExtension::ALIAS);
        $rootNode = $treeBuilder->getRootNode();

        SettingsBuilder::append(
            $rootNode,
            [
                'company_name'                  => ['type' => 'string', 'value' => null],
                'company_logo'                  => ['value' => null],
                'header_footer_bg_color'        => ['type' => 'string', 'value' => null],
                'header_footer_text_color'      => ['type' => 'string', 'value' => null],
                'main_menu_bg_color'            => ['type' => 'string', 'value' => null],
                'main_menu_text_color'          => ['type' => 'string', 'value' => null],
                'secondary_menu_bg_color'       => ['type' => 'string', 'value' => null],
                'secondary_menu_text_color'     => ['type' => 'string', 'value' => null],
                'table_header_bg_color'         => ['type' => 'string', 'value' => null],
                'table_header_text_color'       => ['type' => 'string', 'value' => null],
                'main_button_bg_color'          => ['type' => 'string', 'value' => null],
                'main_button_text_color'        => ['type' => 'string', 'value' => null],
                'secondary_button_bg_color'     => ['type' => 'string', 'value' => null],
                'secondary_button_text_color'   => ['type' => 'string', 'value' => null],
                'icon_bg_color'                 => ['type' => 'string', 'value' => null],
                'icon_content_color'            => ['type' => 'string', 'value' => null],
                'form_bg_color'                 => ['type' => 'string', 'value' => null],
                'link_color'                    => ['type' => 'string', 'value' => null],
                'font_family'                   => ['type' => 'string', 'value' => null],
            ]
        );

        return $treeBuilder;
    }
}
