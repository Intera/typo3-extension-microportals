<?php
/** @noinspection PhpMissingStrictTypesDeclarationInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

defined('TYPO3_MODE') or die();

$lllPrefixPages = 'LLL:' . 'EXT:microportals/Resources/Private/Language/locallang_db.xlf:pages.';
$lllPrefixFileReference = 'LLL:' . 'EXT:lang/locallang_tca.xlf:sys_file_reference.';

$imageShowitem = '--palette--;' . $lllPrefixFileReference . 'imageoverlayPalette;txMicroportalsImageOverlayPalette,
                  --palette--;;filePalette';

$pagesColumns = [
    'tx_microportals_portalimage' => [
        'label' => $lllPrefixPages . 'tx_microportals_portalimage',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'tx_microportals_portalimage',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                ],
                'maxitems' => 1,
                'foreign_types' => [
                    '0' => [
                        'showitem' => $imageShowitem,
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => $imageShowitem,
                    ],
                ],
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ],
    'tx_microportals_portalteaser' => [
        'label' => $lllPrefixPages . 'tx_microportals_portalteaser',
        'config' => [
            'type' => 'input',
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $pagesColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;' . $lllPrefixPages . 'tx_microportals_tabheader,'
    . 'tx_microportals_portalimage, tx_microportals_portalteaser'
);

unset($pagesColumns);
unset($imageShowitem);
unset($lllPrefixFileReference);
unset($lllPrefixPages);
