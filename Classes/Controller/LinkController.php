<?php
namespace FORM4\Form4Socialmedialinks\Controller;

/*
* Copyright notice
*
* (c) 2016 form4 GmbH <typo3@form4.de>
* All rights reserved
*
* This file is part of the TYPO3 CMS project.
*
* It is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License, either version 2
* of the License, or any later version.
*
* For the full copyright and license information, please read the
* LICENSE.txt file that was distributed with this source code.
*
* The TYPO3 project - inspiring people to share!
*/
use FORM4\Form4Socialmedialinks\Domain\Repository\LinkRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

/**
 * LinkController
 */
class LinkController extends ActionController
{
    /**
     * linkRepository
     *
     * @var LinkRepository
     */
    protected $linkRepository;

    public function __construct(LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    /**
     * list all choosen social media elements
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        // add css file, if enabled
        if ($this->settings['css_enable'] == 1) {
            $extKey = $this->request->getControllerExtensionKey();
            $GLOBALS['TSFE']->additionalHeaderData[$extKey] = '<link rel="stylesheet" type="text/css" href="' . PathUtility::stripPathSitePrefix(ExtensionManagementUtility::extPath($extKey)) . 'Resources/Public/CSS/' . $extKey . '.css" />';
        }

        // set linkRepository storage pid to false
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->linkRepository->setDefaultQuerySettings($querySettings);

        // get links
        $links = $this->getLinks($this->settings['elements']);
        $this->view->assign('links', $links);

        // get cobject for rendering typoscript
        $cObj = $this->request->getAttribute('currentContentObject');

        // get typoscript
        $tsArray = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        // read marker array
        $markers = [];
        if (isset($tsArray['plugin.']['tx_form4socialmedialinks_list.']['markers.']) && !empty($tsArray['plugin.']['tx_form4socialmedialinks_list.']['markers.'])) {
            $tsMarkers = $tsArray['plugin.']['tx_form4socialmedialinks_list.']['markers.'];

            foreach ($tsMarkers as $marker => $replace) {
                // only $marker without . will be marker keys
                if (substr($marker, -1) !== '.') {
                    // if config available use ist
                    if (isset($tsMarkers[$marker . '.'])) {
                        $markers['###' . $marker . '###'] = $cObj->cObjGetSingle($tsMarkers[$marker], $tsMarkers[$marker . '.']);
                    } else {
                        $markers['###' . $marker . '###'] = $replace;
                    }
                }
            }
        }
        $this->view->assign('marker', array_keys($markers));
        $this->view->assign('replace', $markers);

        return $this->htmlResponse();
    }

    /**
     * get the domain models of the choosen social media elements
     *
     * @param string $elements comma separated list of uid or identifier (can be mixed)
     * @return array of \FORM4\Form4Socialmedialinks\Domain\Model\Link
     */
    public function getLinks($elements)
    {
        $links = [];
        if (!empty($elements)) {
            foreach (explode(',', $elements) as $id) {
                if ((int)$id) {
                    $tmp = $this->linkRepository->findByUid($id);
                } else {
                    $tmp = $this->linkRepository->findOneBy(['identifier' => $id]);
                }
                if (!empty($tmp)) {
                    $links[] = $tmp;
                }
            }
        }
        return $links;
    }
}
