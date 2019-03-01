<?php

namespace OTHMAN\OsIframe\Controller;

/***************************************************************
 * IframeController
 * 'author' => 'Majd Othman',
 * 'author_email' => 'majd.os.sy@hotmail.com',
 ***************************************************************/

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Plugin\AbstractPlugin;

/**
 * Class IframeController
 *
 * @package OTHMAN\OsIframe\Controller
 */
class IframeController extends AbstractPlugin
{
    /**
     * @var ContentObjectRenderer
     */
    public $cObj;
    /**
     * @var StandaloneView
     */
    private $renderer;

    /**
     * IframeController constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        $this->renderer = GeneralUtility::makeInstance(StandaloneView::class);
    }

    /**
     * @param $content
     * @param array $conf
     * @return string
     * @throws \InvalidArgumentException
     */
    public function main($content, array $conf)
    {
        // FlexFormService
        $flexformService = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Service\FlexFormService');
        $urls = $flexformService->convertFlexFormContentToArray(($this->cObj->data['pi_flexform']))['url'];
        $width = $flexformService->convertFlexFormContentToArray(($this->cObj->data['pi_flexform']))['width'];
        $height = $flexformService->convertFlexFormContentToArray(($this->cObj->data['pi_flexform']))['height'];
        $inlineStyle = $flexformService->convertFlexFormContentToArray(($this->cObj->data['pi_flexform']))['inlineStyle'];

        $this->renderer->setTemplatePathAndFilename($conf['fileTemplate']);

//         if fileTemplate not configured in TS
//         $this->renderer->setTemplatePathAndFilename('EXT:os_iframe/Resources/Private/Templates/Iframe/Url.html');

        $this->renderer->assign('url', $urls);
        $this->renderer->assign('width', $width);
        $this->renderer->assign('height', $height);
        $this->renderer->assign('inlineStyle', $inlineStyle);

        return $this->renderer->render();
    }
}
