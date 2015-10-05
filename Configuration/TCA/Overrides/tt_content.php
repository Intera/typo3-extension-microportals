<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content', 'menu_type', array(
	'LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:tt_content.menu_type.I.tx_microportals_sel_pg',
	'tx_microportals_sel_pg'
));

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content', 'menu_type', array(
	'LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:tt_content.menu_type.I.tx_microportals_sel_subpg',
	'tx_microportals_sel_subpg'
));

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content', 'menu_type', array(
	'LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:tt_content.menu_type.I.tx_microportals_sel_pg_wsub',
	'tx_microportals_sel_pg_wsub'
));

// We have to hide the category fields, otherwise we will get an Exception (see CategoryRegistry::getCategoryFieldsForTable()).
$GLOBALS['TCA']['tt_content']['types']['menu']['subtypes_excludelist']['tx_microportals_sel_pg'] = 'selected_categories,category_field';
$GLOBALS['TCA']['tt_content']['types']['menu']['subtypes_excludelist']['tx_microportals_sel_subpg'] = 'selected_categories,category_field';
$GLOBALS['TCA']['tt_content']['types']['menu']['subtypes_excludelist']['tx_microportals_sel_pg_wsub'] = 'selected_categories,category_field';