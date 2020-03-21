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
                'company_name' => ['type' => 'string', 'value' => null],
                'company_logo' => ['value' => null],
            ]
        );

        return $treeBuilder;
    }
}
