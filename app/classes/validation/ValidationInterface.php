<?php
namespace Gamee\Validation;

interface ValidationInterface
{
	/**
	 * @param array $data
	 * @return bool
	 */
	public function isValid(array $data);
}