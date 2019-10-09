<?php
/** @noinspection PhpMissingStrictTypesDeclarationInspection */

defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['sys_file_reference']['palettes']['txMicroportalsImageOverlayPalette'] = [
    'showitem' => 'title,alternative,--linebreak--,crop',
    'canNotCollapse' => true,
];
