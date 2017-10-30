<?php
namespace Gamee\Strategy;

use Gamee\Exception\WatchException;

class XmlStrategy extends AbstractStrategy implements StrategyInterface
{
	/**
	 * @todo Implement XML parser
	 */
	public function loadFromString($string)
	{
		throw new WatchException('Strategy not implemented');
	}
}