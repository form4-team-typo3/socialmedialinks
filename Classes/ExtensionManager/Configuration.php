<?php

namespace FORM4\Form4Socialmedialinks\ExtensionManager;

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
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Configuration class for the TYPO3 Extension Manager.
 */
class Configuration
{
    /** @var string */
    protected $extKey = 'form4_socialmedialinks';

    /**
     * @var StandaloneView
     */
    protected $standAloneView;

    public function __construct(StandaloneView $standaloneView, private readonly UriBuilder $uriBuilder)
    {
        $this->standAloneView = $standaloneView;
    }

    /**
     * Returns the information to the update script
     *
     * @param array $params
     * @param \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $pObj
     * @return string
     */
    public function importDefaultSocialmedialinks(array $params, TypoScriptConstantsViewHelper $pObj)
    {
        $updateScript = $this->getExtensionManagerLink($this->extKey, 'UpdateScript', 'show');
        $this->standAloneView->getRenderingContext()->getTemplatePaths()->setTemplatePathAndFilename(Environment::getPublicPath() . '/' . 'typo3conf/ext/form4_socialmedialinks/Resources/Private/Templates/ExtensionManager/Configuration.html');
        $this->standAloneView->assign('updateScript', $updateScript);
        return $this->standAloneView->render();
    }

    /**
     * copied from \Causal\Sphinx\Utility\MiscUtility
     *
     * Returns a link to the Extension Manager (EM) for an optional given action.
     *
     * @param string $extensionKey
     * @param string $controller
     * @param string $action
     * @param array $additionalUrlParameters
     * @return string
     */
    public function getExtensionManagerLink($extensionKey = '', $controller = '', $action = '', array $additionalUrlParameters = [])
    {
        $namespace = 'tx_extensionmanager_tools_extensionmanagerextensionmanager';
        $moduleName = 'tools_ExtensionmanagerExtensionmanager';
        $urlParameters = $additionalUrlParameters;

        if (!empty($extensionKey)) {
            $urlParameters[$namespace . '[extension][key]'] = $extensionKey;
            $urlParameters[$namespace . '[extensionKey]'] = $extensionKey;
        }
        if (!empty($controller) && !empty($action)) {
            $urlParameters[$namespace . '[controller]'] = $controller;
            $urlParameters[$namespace . '[action]'] = $action;
        }

        //TODO: please check link, not sure if absolute link is correct here
        $uriBuilder = $this->uriBuilder;
        $extensionManagerUri = $uriBuilder->buildUriFromRoute($moduleName, $urlParameters);
        return $extensionManagerUri;
    }
}
