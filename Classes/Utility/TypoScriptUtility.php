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

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Utility class for manipulating TYPO3 menu object
 */
class TypoScriptUtility implements SingletonInterface {

	/**
	 * Counter, which content part should be used in the next call.
	 *
	 * @var int
	 */
	protected $contentIndex = 0;

	/**
	 * Fetches TypoScript from a given path, explodes the string by a given delimiter
	 * an returns the element from the current contentIndex that will be increased
	 * by every call and is reset if it matches the configured resetAfter value.
	 *
	 * @param string $content
	 * @param array $config
	 * @return string
	 */
	public function fetchAndExplodeTypoScriptFromPath($content, $config) {

		if (!isset($config['path'])) {
			return 'The TypoScript path is not specified.';
		}

		$template = $this->getTypoScriptFrontendController()->tmpl;
		$setup = &$template->setup;
		$pathParts = explode('.', $config['path']);

		foreach ($pathParts as $pathPart) {

			if (!is_array($setup)) {
				return 'The TypoScript path ' . $config['path'] . ' could not be fully retrieved.';
			}

			if (isset($setup[$pathPart . '.'])) {
				$setup = &$setup[$pathPart . '.'];
			} elseif (isset($setup[$pathPart])) {
				$content .= $setup[$pathPart];
			}
		}

		if (isset($config['delimiter'])) {
			$delimiter = $config['delimiter'];
			if ($delimiter === 'optionSplit') {
				$delimiter = '|*|';
			}
			$contentParts = GeneralUtility::trimExplode($delimiter, $content, TRUE);
			$content = $contentParts[$this->contentIndex];
		}

		$this->contentIndex++;

		if (isset($config['resetAfter']) && $this->contentIndex === (int)$config['resetAfter']) {
			$this->contentIndex = 0;
		}

		return $content;
	}

	/**
	 * @return \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
	 */
	protected function getTypoScriptFrontendController() {
		return $GLOBALS['TSFE'];
	}

}