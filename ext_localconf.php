<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
};
call_user_func(function () {
    /**
     * CType plugin (tx_osiframe_pi1)
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43(
        'os_iframe',
        'Classes/Controller/IframeController.php',
        '_pi1',
        'CType',
        0
    );
    $overrideSetup = 'plugin.tx_osiframe_pi1.userFunc = ' . \OTHMAN\OsIframe\Controller\IframeController::class . '->main';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('os_iframe', 'setup', $overrideSetup);
    /*****************************************
     * END IFrame Plugin
     *****************************************/
});
