<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle\Email;

use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Oro\Bundle\EmailBundle\Model\EmailTemplateInterface;
use Oro\Bundle\EmailBundle\Provider\EmailRenderer;
use Twig\Extension\ExtensionInterface;

class EmailRendererDecorator extends EmailRenderer
{
    public function __construct(private EmailRenderer $originalRenderer, private ConfigManager $configManager)
    {
    }

    public function compileMessage(EmailTemplateInterface $template, array $templateParams = []): array
    {
        list($subject, $content) = $this->originalRenderer->compileMessage($template, $templateParams);

        if ($this->configManager->get('ystools_dtc.email_template_wrapper_enabled')) {
            $search = ['{{ system.appURL }}', '{{ subject }}', '{{ content }}'];
            $replace = [$this->configManager->get('oro_ui.application_url'), $subject, $content];

            $wrapper = $this->configManager->get('ystools_dtc.email_template_wrapper');
            $wrapper = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $wrapper);
            $content = str_replace($search, $replace, $wrapper);
            $content = sprintf('<html><body style="margin:0;">%s</body></html>', $content);
        }

        return [$subject, $content];
    }

    public function compilePreview(EmailTemplateInterface $template): string
    {
        return $this->originalRenderer->compilePreview($template);
    }

    public function addExtension(ExtensionInterface $extension): void
    {
        $this->originalRenderer->addExtension($extension);
    }

    public function addSystemVariableDefaultFilter(string $variable, string $filter): void
    {
        $this->originalRenderer->addSystemVariableDefaultFilter($variable, $filter);
    }

    public function renderTemplate(string $template, array $templateParams = []): string
    {
        return $this->originalRenderer->renderTemplate($template, $templateParams);
    }

    public function validateTemplate(string $template): void
    {
        $this->originalRenderer->validateTemplate($template);
    }
}
