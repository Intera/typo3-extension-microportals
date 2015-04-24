<?php
namespace Int\Microportals\Install;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "microportals".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Utility class for manipulating TYPO3 menu object
 */
class MenuTypesUpdate extends \TYPO3\CMS\Install\Updates\AbstractUpdate {

	/**
	 * @var string
	 */
	protected $title = 'microportals menu types';

	/**
	 * @var \TYPO3\CMS\Core\Database\DatabaseConnection
	 */
	protected $typo3Db;

	protected $menuTypeConversion = array(
		'10' => 'tx_microportals_sel_pg',
		'11' => 'tx_microportals_sel_subpg',
		'12' => 'tx_microportals_sel_pg_wsub',
	);

	/**
	 * Initializes typo3Db
	 */
	public function __construct() {
		$this->typo3Db = $GLOBALS['TYPO3_DB'];
	}

	/**
	 * Checks whether updates are required.
	 *
	 * @param string &$description The description for the update
	 * @return boolean Whether an update is required (TRUE) or not (FALSE)
	 */
	public function checkForUpdate(&$description) {
		$description = 'Upgrades the old microportal menu types to the new version.
			<br /><b>Warning!</b> Only use this if you do not have any category
			based menus in your installation!';
		$oldMenuTypes = array_keys($this->menuTypeConversion);
		$oldMenuTypes = $this->typo3Db->fullQuoteArray($oldMenuTypes, 'tt_content');
		$oldMenuTypesList = implode(',', $oldMenuTypes);
		$result = $this->typo3Db->exec_SELECTquery('uid', 'tt_content', 'tt_content.CType=\'menu\' AND tt_content.menu_type IN (' . $oldMenuTypesList . ')');
		if ($this->typo3Db->sql_num_rows($result)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Performs the accordant updates.
	 *
	 * @param array &$dbQueries Queries done in this update
	 * @param mixed &$customMessages Custom messages
	 * @return boolean Whether everything went smoothly or not
	 */
	public function performUpdate(array &$dbQueries, &$customMessages) {
		$result = TRUE;
		foreach ($this->menuTypeConversion as $oldType => $newType) {
			$update = array('menu_type' => $newType);
			$this->typo3Db->exec_UPDATEquery('tt_content', 'tt_content.CType=\'menu\' AND tt_content.menu_type=' . $this->typo3Db->fullQuoteStr($oldType, 'tt_content'), $update);
			$dbQueries[] = str_replace(chr(10), ' ', $this->typo3Db->debug_lastBuiltQuery);
			if ($this->typo3Db->sql_error()) {
				$customMessages = 'SQL-ERROR: ' . htmlspecialchars($this->typo3Db->sql_error());
				$result = FALSE;
			}
		}
		return $result;
	}
}