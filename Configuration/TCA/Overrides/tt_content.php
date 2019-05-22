<?php

/** @noinspection PhpFullyQualifiedNameUsageInspection */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$lllPrefix = 'LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:';

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

unset($lllPrefix);
