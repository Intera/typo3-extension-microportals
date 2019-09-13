<?php
/** @noinspection PhpMissingStrictTypesDeclarationInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

defined('TYPO3_MODE') or die();

$lllPrefix = 'LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    [
        'tx_microportals_enable_zoom' => [
            'exclude' => 1,
            'label' => $lllPrefix . 'tt_content.tx_microportals_with_zoom',
            'config' => [
                'type' => 'check',
                'default' => true,
            ],
        ],
    ]
);

// Microportal of selected pages.
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        $lllPrefix . 'tt_content.menu_type.I.tx_microportals_sel_pg',
        'tx_microportals_sel_pg',
    ]
);

$GLOBALS['TCA']['tt_content']['types']['tx_microportals_sel_pg'] =
    $GLOBALS['TCA']['tt_content']['types']['menu_pages'];

// Microportal of subpages of selected pages.
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        $lllPrefix . 'tt_content.menu_type.I.tx_microportals_sel_subpg',
        'tx_microportals_sel_subpg',
    ]
);

$GLOBALS['TCA']['tt_content']['types']['tx_microportals_sel_subpg'] =
    $GLOBALS['TCA']['tt_content']['types']['menu_subpages'];

$extensionConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
);

if ($extensionConfig->get('microportals', 'enableMicroportalWithSupages')) {
// Microportal with subpages of selected pages.
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $lllPrefix . 'tt_content.menu_type.I.tx_microportals_sel_pg_wsub',
            'tx_microportals_sel_pg_wsub',
        ]
    );

    $GLOBALS['TCA']['tt_content']['types']['tx_microportals_sel_pg_wsub'] =
        $GLOBALS['TCA']['tt_content']['types']['menu_pages'];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        'tx_microportals_enable_zoom',
        'tx_microportals_sel_pg_wsub',
        'before:pages'
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'tx_microportals_enable_zoom',
    'tx_microportals_sel_pg,tx_microportals_sel_subpg',
    'before:pages'
);

unset($extensionConfig);
unset($lllPrefix);
