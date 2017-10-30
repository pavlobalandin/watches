<?php
namespace Gamee\Validation;

class DescriptionValidation extends Validation implements ValidationInterface
{
	const MIN_LENGTH = 15;

	/**
	 * @param array $data
	 * @return bool
	 */
	public function isValid(array $data)
	{
		if (!parent::isValid($data)) {
			return FALSE;
		}

		if ($data[$this->keyField] === NULL) {
			return FALSE;
		}

		return strlen($data[$this->keyField]) >= self::MIN_LENGTH;
	}

}
