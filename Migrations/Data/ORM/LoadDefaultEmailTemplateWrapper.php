<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle\Migrations\Data\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class LoadDefaultEmailTemplateWrapper extends AbstractFixture implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    // @codingStandardsIgnoreStart
    public const DEFAULT_WRAPPER = '
        <div style="background-color: #ebebeb; font-family: Roboto, Helvetica, Arial, Lucida, sans-serif;">
            <div style="background-color: #ebebeb; height: 20px;"></div>
            <table style="width: 600px; margin: auto; border-collapse: collapse;">
                <tr>
                    <td colspan="2" style="background-color: #ffffff; border: 0; padding: 0;">
                        <img style="border:0; outline:none; text-decoration:none; display:block; margin: auto; padding: 20px;" src="/bundles/orofrontend/default/images/logo/demob2b-logo.svg" alt="Logo" width="167" height="32">
                        <div style="width: 580px; height: 2px; margin: auto; background-color: #e0e0e0"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: #ffffff; border: 0; padding: 20px;">{{ content }}</td>
                </tr>
                <tr>
                    <td style="background-color: #e0e0e0; border: 0; padding: 10px 0 0 30px; text-align: left;">
                        <div><a href="mailto:admin@acme.com" style="color: #464646; font-size: 13px;">admin@acme.com</a></div>
                        <div><a href="tel:+1 234 567 890" style="color: #464646; font-size: 13px;">+1 234 567 890</a></div>
                    </td>
                    <td style="background-color: #e0e0e0; border: 0; padding: 10px 30px 0 0; text-align: right;">
                        <ul style="list-style: none;">
                            <li style="display: inline-block; width: 32px; height: 32px; border-radius: 25%; background-color: #ffffff;"><a href="https://www.facebook.com/" title="Facebook"><img src="/bundles/ystoolsdefaultthemeconfiguration/images/social/facebook.svg" alt="Facebook" width="32" height="32"></a></li>
                            <li style="display: inline-block; width: 32px; height: 32px; border-radius: 25%; background-color: #ffffff;"><a href="https://www.instagram.com/" title="Instagram"><img src="/bundles/ystoolsdefaultthemeconfiguration/images/social/instagram.svg" alt="Instagram" width="32" height="32"></a></li>
                            <li style="display: inline-block; width: 32px; height: 32px; border-radius: 25%; background-color: #ffffff;"><a href="https://www.twitter.com/" title="Twitter"><img src="/bundles/ystoolsdefaultthemeconfiguration/images/social/twitter.svg" alt="Twitter" width="32" height="32"></a></li>
                            <li style="display: inline-block; width: 32px; height: 32px; border-radius: 25%; background-color: #ffffff;"><a href="https://www.linkedin.com/" title="LinkedIn"><img src="/bundles/ystoolsdefaultthemeconfiguration/images/social/linkedin.svg" alt="LinkedIn" width="32" height="32"></a></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: #e0e0e0; border: 0; padding: 0 0 10px 0; text-align: center">
                        <div style="color: #464646; font-size: 11px;">2023 Acme, Inc. All Rights Reserved</div>
                    </td>
                </tr>
            </table>
            <div style="background-color: #ebebeb; height: 20px;"></div>
        </div>';
    // @codingStandardsIgnoreEnd

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var ConfigManager $configManager */
        $configManager = $this->container->get('oro_config.global');
        $configManager->set('ystools_dtc.email_template_wrapper', self::DEFAULT_WRAPPER);
        $configManager->flush();
    }
}
