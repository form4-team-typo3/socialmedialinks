<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use FORM4\Form4Socialmedialinks\Controller\LinkController;

defined('TYPO3') or die();

// ===========================================================================
// Plugin configuration
// ===========================================================================

ExtensionUtility::configurePlugin(
	'Form4Socialmedialinks',
	'List',
	array(
		LinkController::class => 'list',
	),
	array(
	),
    ExtensionUtility::PLUGIN_TYPE_PLUGIN
);
