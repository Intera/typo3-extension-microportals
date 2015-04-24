<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('microportals', 'Configuration/TypoScript/Textpic', 'Microportals - Textpic rendering');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('microportals', 'Configuration/TypoScript/Bootstrap', 'Microportals - Bootstrap rendering');