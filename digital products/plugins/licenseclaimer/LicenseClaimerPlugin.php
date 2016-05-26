<?php
/**
 * License Claimer plugin for Craft CMS
 *
 * Claims a Digital Product License by email and license key.
 *
 * @author    Pixel &amp; Tonic
 * @copyright Copyright (c) 2016 Pixel &amp; Tonic
 * @link      http://pixelandtonic.com
 * @package   LicenseClaimer
 * @since     1.0.0
 */

namespace Craft;

class LicenseClaimerPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('License Claimer');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Claims a Digital Product License by email and license key.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Pixel & Tonic';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://pixelandtonic.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }
}