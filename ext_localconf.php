<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['tx_microportals_menutypesupdate'] = 'Int\\Microportals\\Install\\MenuTypesUpdate';