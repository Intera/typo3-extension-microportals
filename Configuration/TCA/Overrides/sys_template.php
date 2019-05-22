<?php
/** @noinspection PhpMissingStrictTypesDeclarationInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'microportals',
    'Configuration/TypoScript/Textpic',
    'Microportals - Textpic rendering'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'microportals',
    'Configuration/TypoScript/Bootstrap',
    'Microportals - Bootstrap rendering'
);
