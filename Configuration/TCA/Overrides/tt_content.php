<?php

/***************************************************************
 * tt_content.php
 * 'author' => 'Majd Othman',
 * 'author_email' => 'majd.os.sy@hotmail.com',
 ***************************************************************/

call_user_func(function () {
    /**
     * CType plugin (osiframe_pi1)
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'OTHMAN: iframe URL',
            'os_iframe_pi1',
            'EXT:os_iframe/ext_icon.gif',
        ],
        'CType',
        'os_iframe'
    );

    /**
     * FlexForm for IFrame
     */
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['os_iframe_pi1'] = 'pi_flexform';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['os_iframe_pi1'] = 'recursive,pages';
    $GLOBALS['TCA']['tt_content']['types']['os_iframe_pi1']['showitem'] = '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,header,pi_flexform';
    $GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds'][',' . 'os_iframe_pi1'] = 'FILE:EXT:os_iframe/Configuration/FlexForm/Iframe.xml';
    $GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds_pointerField'] = 'list_type,CType';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        'os_iframe_pi1',
        'FILE:EXT:os_iframe/Configuration/FlexForm/Iframe.xml',
        'os_iframe_pi1'
    );
    /*****************************************
     * END IFrame Plugin
     *****************************************/
});
