<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TCA']['sys_file_reference']['palettes']['txMicroportalsImageOverlayPalette'] = [
    'showitem' => 'title,alternative;;;;3-3-3',
    'canNotCollapse' => true,
];
