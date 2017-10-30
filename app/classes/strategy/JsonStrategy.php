<?php
namespace Gamee\Strategy;

use Gamee\Exception\LoadException;

class JsonStrategy extends AbstractStrategy implements StrategyInterface
{
	/**
	 * @param string $string
	 * @return bool
	 */
	public function loadFromString($string)
	{
		$this->exception = NULL;

		$string = preg_replace('/[\r\n\t]+/s', '', $string);
		$string = preg_replace('/\"\s*\:\s*([\"\{])/', '":\\1', $string);

		$this->data = json_decode($string, TRUE);

		if (!empty($this->data)) {
			return TRUE;
		}
		$this->exception = new LoadException('Input format is not valid.');

		return FALSE;
	}
}