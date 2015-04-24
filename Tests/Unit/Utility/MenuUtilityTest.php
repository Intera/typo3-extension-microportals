<?php
namespace Int\Microportals\Tests\Unit\Utility;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "microportals".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Unit tests for the menu MenuUtility class.
 */
class MenuUtilityTest extends UnitTestCase {

	/**
	 * @var \Int\Microportals\Utility\MenuUtility
	 */
	protected $menuUtility;

	/**
	 * Initializes the menu utility.
	 */
	public function setUp() {
		$this->menuUtility = GeneralUtility::makeInstance('Int\\Microportals\\Utility\\MenuUtility');
	}

	/**
	 * @test
	 */
	public function removeNavTitleItemArrayProcFuncRemovesNavTitle() {
		$testArray = array(
			array(
				'test1' => 'test2',
				'nav_title' => 'test'
			),
			array(
				'test3' => 'test4',
				'nav_title' => 'test2'
			)
		);
		$resultArray = array(
			array(
				'test1' => 'test2',
				'nav_title' => ''
			),
			array(
				'test3' => 'test4',
				'nav_title' => ''
			)
		);
		$processedArray = $this->menuUtility->removeNavTitleItemArrayProcFunc($testArray);
		$this->assertEquals($resultArray, $processedArray);
	}
}