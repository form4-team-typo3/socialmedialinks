<?php

use FORM4\Aokb\Utility\Configuration\TcaFieldUtility;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link',
        'label' => 'title',
        'label_alt' => 'identifier',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'dividers2tabs' => true,
        'sortby' => 'sorting',
        'versioningWS' => false,
        'versioning_followPages' => true,
        'type' => 'type',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,identifier,type,url,html',
        'iconfile' => 'EXT:form4_socialmedialinks/Resources/Public/Icons/Extension.png',
    ],
    'types' => [
        '0' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource;;1, title, identifier, type, url, social_media_icon, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime',
        ],
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource;;1, title, identifier, type, html, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime',
        ],
    ],
    'palettes' => [
        '1' => [
            'showitem' => '',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
            'onChange' => 'reload',
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_form4socialmedialinks_domain_model_link',
                'foreign_table_where' => 'AND {#tx_form4socialmedialinks_domain_model_link}.{#pid}=###CURRENT_PID### AND {#tx_form4socialmedialinks_domain_model_link}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => TcaFieldUtility::tcaConfigForStartTimeField(
            exclude: true,
        ),
        'endtime' => TcaFieldUtility::tcaConfigForEndTimeField(
            exclude: true,
        ),

        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'identifier' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.identifier',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,unique,alpha,lower',
                'required' => true,
            ],
        ],
        'type' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.type.0',
                        'value' => 0,
                    ],
                    [
                        'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.type.1',
                        'value' => 1,
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
                'required' => true,
            ],
        ],
        'url' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.url',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 2,
                'eval' => 'trim',
            ],
        ],
        'html' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.html',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'eval' => 'trim',
            ],
        ],
        'icon' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.icon',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'maxitems' => 1,
            ],
        ],
        'social_media_icon' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.icon',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.iconselect.default', 'value' => ''],
                    ['label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.iconselect.facebook', 'value' => 'facebook'],
                    ['label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.iconselect.instagram', 'value' => 'instagram'],
                    ['label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.iconselect.linkedin', 'value' => 'linkedin'],
                    ['label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.iconselect.x', 'value' => 'x'],
                    ['label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.iconselect.xing', 'value' => 'xing'],
                    ['label' => 'LLL:EXT:form4_socialmedialinks/Resources/Private/Language/locallang_db.xlf:tx_form4socialmedialinks_domain_model_link.iconselect.youtube', 'value' => 'youtube'],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => '',
            ],
        ],
    ],
];
