<?php
defined('TYPO3_MODE') || die();

/***************************************************************
 * sys_template.php
 * 'author' => 'Majd Othman',
 * 'author_email' => 'majd.os.sy@hotmail.com',
 ***************************************************************/

/**
 * Include TypoScript
 */
call_user_func(
    function ($extKey) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            $extKey,
            'Configuration/TypoScript',
            'Othman IFrame (os_iframe)'
        );
    },
    'os_iframe'
);
