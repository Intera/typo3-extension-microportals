<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') or die();

$lllPrefixPages = 'LLL:' . 'EXT:microportals/Resources/Private/Language/locallang_db.xlf:pages.';
$lllPrefixFileReference = 'LLL:' . 'EXT:lang/locallang_tca.xlf:sys_file_reference.';

$imageShowitem = '--palette--;' . $lllPrefixFileReference . 'imageoverlayPalette;txMicroportalsImageOverlayPalette,
                  --palette--;;filePalette';

$pagesColumns = [
    'tx_microportals_portalicon' => [
        'exclude' => true,
        'label' => $lllPrefixPages . 'tx_microportals_portalicon',
        'config' => [
            'type' => 'input',
        ],
    ],
    'tx_microportals_portalimage' => [
        'exclude' => true,
        'label' => $lllPrefixPages . 'tx_microportals_portalimage',
        'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
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
        'exclude' => true,
        'label' => $lllPrefixPages . 'tx_microportals_portalteaser',
        'config' => [
            'type' => 'input',
        ],
    ],
    'tx_microportals_title_override' => [
        'exclude' => true,
        'label' => $lllPrefixPages . 'tx_microportals_title_override',
        'description' => $lllPrefixPages . 'tx_microportals_title_override_description',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
            'eval' => 'trim',
            'placeholder' => '__row|title',
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('pages', $pagesColumns);
ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '
        --div--;' . $lllPrefixPages . 'tx_microportals_tabheader,
            tx_microportals_portalimage,
            tx_microportals_portalteaser,
            tx_microportals_portalicon,
            tx_microportals_title_override
    '
);
