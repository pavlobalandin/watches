<?php
namespace Gamee\Strategy;

use Gamee\Exception\WatchException;

interface StrategyInterface
{
	/**
	 * @param string $string
	 * @return bool
	 */
	public function loadFromString($string);

	/**
	 * @param string $fileName
	 * @return bool
	 */
	public function loadFromFile($fileName);

	/**
	 * @return WatchException
	 */
	public function getException();

	/**
	 * @return array
	 */
	public function getData();
}