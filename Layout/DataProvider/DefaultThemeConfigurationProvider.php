<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle\Layout\DataProvider;

use Oro\Bundle\AttachmentBundle\Entity\File;
use Oro\Bundle\AttachmentBundle\Manager\AttachmentManager;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Oro\Bundle\EntityBundle\ORM\DoctrineHelper;

class DefaultThemeConfigurationProvider
{
    /** @var ConfigManager */
    private $configManager;

    /** @var DoctrineHelper */
    private $doctrineHelper;

    /** @var AttachmentManager */
    private $attachmentManager;

    /**
     * @param ConfigManager $configManager
     * @param DoctrineHelper $doctrineHelper
     * @param AttachmentManager $attachmentManager
     */
    public function __construct(
        ConfigManager $configManager,
        DoctrineHelper $doctrineHelper,
        AttachmentManager $attachmentManager
    ) {
        $this->configManager = $configManager;
        $this->doctrineHelper = $doctrineHelper;
        $this->attachmentManager = $attachmentManager;
    }

    /**
     * @return string|null
     */
    public function getFavicon()
    {
        $id = $this->configManager->get('ystools_dtc.favicon');
        if (!$id) {
            return null;
        }

        /** @var File $image */
        $image = $this->doctrineHelper->getEntity(File::class, $id);
        if (!$image) {
            return null;
        }

        if ($image->getExtension() === 'ico') {
            return $this->attachmentManager->getFileUrl($image);
        } else {
            return $this->attachmentManager->getFilteredImageUrl($image, 'dtc_favicon');
        }
    }
}
