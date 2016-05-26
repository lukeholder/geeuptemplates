<?php
/**
 * License Claimer plugin for Craft CMS
 *
 * LicenseClaimer Controller
 *
 * @author    Pixel &amp; Tonic
 * @copyright Copyright (c) 2016 Pixel &amp; Tonic
 * @link      http://pixelandtonic.com
 * @package   LicenseClaimer
 * @since     1.0.0
 */

namespace Craft;

class LicenseClaimerController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = array('');

    /**
     */
    public function actionClaim()
    {
        $this->requireLogin();
        $this->requirePostRequest();

        $licenseKey = craft()->request->getRequiredPost('licenseKey');
        $email = craft()->request->getRequiredPost('licenseEmail');

        if (empty($licenseKey) || empty($email)) {
            craft()->userSession->setFlash('error', Craft::t('Please fill all fields'));
            $this->redirectToPostedUrl();
        }

        $license = craft()->digitalProducts_licenses->getLicenses([
            'licenseKey' => $licenseKey,
            'ownerEmail' => $email,
            'userEmail' => ':empty:'
        ]);
        
        if ($license) {
            $license = reset($license);
            $license->userId = craft()->userSession->getUser()->id;
            craft()->digitalProducts_licenses->saveLicense($license);
            craft()->userSession->setFlash('claimLicenseResult', true);
            craft()->userSession->setFlash('notice', Craft::t('License successfully claimed!'));
        } else {
            craft()->userSession->setFlash('error', Craft::t('Failed to claim the license'));
        }

        $this->redirectToPostedUrl();
    }
}