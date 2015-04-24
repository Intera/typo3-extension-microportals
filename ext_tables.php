<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('pages', 'EXT:microportals/Resources/Private/Language/locallang_csh_pages.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('pages_language_overlay', 'EXT:microportals/Resources/Private/Language/locallang_csh_pages.xlf');

$overlayFields = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields']);
$overlayFields[] = 'tx_microportals_portalimage';
$overlayFields[] = 'tx_microportals_portalteaser';
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] = implode(',', $overlayFields);
unset($overlayFields);