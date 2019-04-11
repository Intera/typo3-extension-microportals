<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$pagesColumns = [
    'tx_microportals_portalimage' => [
        'label' => 'LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:pages.tx_microportals_portalimage',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'tx_microportals_portalimage',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                ],
                'maxitems' => 1,
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;txMicroportalsImageOverlayPalette,
							--palette--;;filePalette',
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;txMicroportalsImageOverlayPalette,
							--palette--;;filePalette',
                    ],
                ],
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ],
    'tx_microportals_portalteaser' => [
        'label' => 'LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:pages.tx_microportals_portalteaser',
        'config' => [
            'type' => 'input',
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $pagesColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:pages.tx_microportals_tabheader,tx_microportals_portalimage,tx_microportals_portalteaser'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $pagesColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages_language_overlay',
    '--div--;LLL:EXT:microportals/Resources/Private/Language/locallang_db.xlf:pages.tx_microportals_tabheader,tx_microportals_portalimage,tx_microportals_portalteaser'
);

unset($pagesColumns);
