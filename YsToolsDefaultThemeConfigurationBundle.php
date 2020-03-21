<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use YsTools\Bundle\DefaultThemeConfigurationBundle\DependencyInjection\YsToolsDefaultThemeConfigurationExtension;

class YsToolsDefaultThemeConfigurationBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new YsToolsDefaultThemeConfigurationExtension();
    }
}
