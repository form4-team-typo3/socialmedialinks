<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

// ===========================================================================
// Plugin registration
// ===========================================================================

ExtensionUtility::registerPlugin(
    'Form4Socialmedialinks',
    'List',
    'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tt_content.plugin.title'
);

$pluginSignature = 'form4socialmedialinks_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:form4_socialmedialinks/Configuration/FlexForms/list.xml');
