<?php

namespace YsTools\Bundle\DefaultThemeConfigurationBundle\Form\DataTransformer;

use Oro\Bundle\AttachmentBundle\Entity\File;
use Oro\Bundle\ConfigBundle\Form\DataTransformer\ConfigFileDataTransformer as BaseTransformer;
use Oro\Bundle\EntityBundle\ORM\DoctrineHelper;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Fix the issue with file upload as different scopes (e.g. different websites) may have different files.
 * Now every time file changed application creates new entity for it.
 */
class ConfigFileDataTransformer extends BaseTransformer
{
    /**
     * @var DoctrineHelper
     */
    private $doctrineHelper;

    /**
     * {@inheritDoc}
     */
    public function __construct(DoctrineHelper $doctrineHelper, ValidatorInterface $validator)
    {
        parent::__construct($doctrineHelper, $validator);

        $this->doctrineHelper = $doctrineHelper;
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($file)
    {
        if (null === $file) {
            return '';
        }

        if ($file->isEmptyFile()) {
            return '';
        }

        $em = $this->doctrineHelper->getEntityManagerForClass(File::class);

        $httpFile = $file->getFile();
        if ($httpFile && $httpFile->isFile() && $this->isValidHttpFile($httpFile)) {
            $file = clone $file; // here is the actual fix!!!
            $file->preUpdate();
            $em->persist($file);
            $em->flush($file);
        }

        $persistedFile = $this->restoreFile($file);
        return $persistedFile ? $persistedFile->getId() : null;
    }
}
