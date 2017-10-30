<?php
namespace Gamee\Strategy;

use Gamee\Exception\LoadException;
use Gamee\Exception\WatchException;

abstract class AbstractStrategy implements StrategyInterface
{
	/** @var array */
	protected $data;

	/** @var WatchException */
	protected $exception;

	abstract public function loadFromString($string);

	public function __construct()
	{
		$this->exception = NULL;
	}

	public function getData()
	{
		return $this->data;
	}

	public function getException()
	{
		return $this->exception;
	}

	/**
	 * @param string $fileName
	 * @return bool
	 */
	public function loadFromFile($fileName)
	{
		$this->exception = NULL;
		try {
			return $this->loadFromString(file_get_contents($fileName));
		} catch (\Exception $exc) {
			$this->exception = new LoadException($exc->getMessage());
			return FALSE;
		}
	}}