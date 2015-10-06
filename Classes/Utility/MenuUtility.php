<?php
namespace Int\Microportals\Utility;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "microportals".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Core\Html\HtmlParser;

/**
 * Utility class for manipulating TYPO3 menu object
 */
class MenuUtility {

	/**
	 * Removes the nav_title from all items in the $menuArray
	 *
	 * @param array $menuArray
	 * @return array
	 */
	public function removeNavTitleItemArrayProcFunc($menuArray) {
		array_walk($menuArray, array($this, 'removeNavTitleFromMenuItem'));
		return $menuArray;
	}

	/**
	 * Replaces ###ATag_begin### and ###ATag_end### with the generated ATag_begin and ATag_end values from the
	 * "parts" array in the given menu item config.
	 *
	 * Currently the markers are replaced in the generated "before" and "after" parts.
	 *
	 * @param array $itemConfig The current menu item config.
	 * @param array $parameters Additional parameters, only contains "parentObj" pointing to the parent menu object.
	 * @return array The updated menu item config.
	 */
	public function replaceATagMarkersInMenuPartsIProcFunc(
		/** @noinspection PhpUnusedParameterInspection */
		$itemConfig, $parameters
	) {

		$markerArray = array(
			'ATag_begin' => $itemConfig['parts']['ATag_begin'],
			'ATag_end' => $itemConfig['parts']['ATag_end'],
			'A1' => $itemConfig['A1'],
			'A2' => $itemConfig['A2'],
			'title' => $itemConfig['title'],
		);

		foreach (array('before', 'after') as $markerReplacePart) {

			if (!isset($itemConfig['parts'][$markerReplacePart])) {
				continue;
			}

			if (strpos($itemConfig['parts'][$markerReplacePart], '###') === FALSE) {
				continue;
			}

			$itemConfig['parts'][$markerReplacePart] = HtmlParser::substituteMarkerArray($itemConfig['parts'][$markerReplacePart], $markerArray, '###|###');
		}

		return $itemConfig;
	}

	/**
	 * Can be used as callback for an array_walk call to set the 'nav_title' to an empty string.U
	 *
	 * @param array $menuItemData
	 */
	protected function removeNavTitleFromMenuItem(&$menuItemData) {
		$menuItemData['nav_title'] = '';
	}
}