<?php
namespace Gamee\Validation;

use Gamee\Exception\ValidationException;

class Validation implements ValidationInterface
{
	/** @var string */
	protected $keyField;

	/**
	 * PriceValidation constructor.
	 * @param string $keyField
	 */
	public function __construct($keyField)
	{
		$this->keyField = $keyField;
	}

	/**
	 * @param array $data
	 * @return bool
	 */
	public function isValid(array $data)
	{
		if (!key_exists($this->keyField, $data)) {
			return FALSE;
		}

		if ($data[$this->keyField] === NULL) {
			return FALSE;
		}

		if ($data[$this->keyField] === FALSE) {
			return FALSE;
		}

		if ($data[$this->keyField] === TRUE) {
			return FALSE;
		}

		return TRUE;
	}

	/**
	 * @return ValidationException
	 */
	public function getException()
	{
		return new ValidationException('Key ' . $this->keyField . ' is not valid.');
	}
}
