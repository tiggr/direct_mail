<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;

defined('TYPO3') || die();

// https://docs.typo3.org/m/typo3/reference-coreapi/12.4/en-us/ExtensionArchitecture/BestPractises/ConfigurationFiles.html
(function (): void {
    // Category field disabled by default in backend forms.
    ExtensionManagementUtility::addPageTSConfig('
    	TCEFORM.tt_content.module_sys_dmail_category.disabled = 1
    	TCEFORM.tt_address.module_sys_dmail_category.disabled = 1
    	TCEFORM.fe_users.module_sys_dmail_category.disabled = 1
    	TCEFORM.sys_dmail_group.select_categories.disabled = 1
    ');

    if (VersionNumberUtility::convertVersionNumberToInteger(ExtensionManagementUtility::getExtensionVersion('tt_address')) <= VersionNumberUtility::convertVersionNumberToInteger('2.3.5')) {
        include_once(ExtensionManagementUtility::extPath('direct_mail') . 'Configuration/TCA/Overrides/tt_address.php');
    }
})();
