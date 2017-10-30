<?php
namespace Gamee\Helper;

use Gamee\Exception\WatchException;
use Gamee\Model\Watch;
use Gamee\Strategy\JsonStrategy;
use Gamee\Strategy\XmlStrategy;

class WatchHelper
{
	const EXT_XML  = 'xml';
	const EXT_JSON = 'json';

	/**
	 * @param string $path
	 * @return array
	 * @throws WatchException
	 */
	public static function loadFromDir($path)
	{
		$dir = opendir($path);
		$watches = [];
		while($file = readdir($dir)) {
			if (preg_match('/^\.{1,2}/', $file)) {
				continue;
			}
			$strategy = NULL;
			switch(self::getExtension($file)) {
				case self::EXT_XML:
					$strategy = new XmlStrategy();
					break;
				case self::EXT_JSON:
					$strategy = new JsonStrategy();
					break;
				default:
					throw new WatchException('Extension not supported: ' . self::getExtension($file) . '. File: ' . $file);
			}

			$watch = new Watch($strategy);
			$watch->load($path . DIRECTORY_SEPARATOR . $file);

			$watches[] = $watch;
		}
		return $watches;
	}

	/**
	 * @param string $fileName
	 * @return null|string
	 */
	public static function getExtension($fileName)
	{
		$parts = pathinfo($fileName);
		if (empty($parts['extension'])) {
			return NULL;
		}
		return strtolower($parts['extension']);
	}
}