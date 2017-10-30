<?php
namespace Gamee\Validation;

class PriceValidation extends Validation implements ValidationInterface
{
	/**
	 * @param array $data
	 * @return bool
	 */
	public function isValid(array $data)
	{
		if (!parent::isValid($data)) {
			return FALSE;
		}

		$value = $data[$this->keyField];

		if (!is_numeric($value)) {
			return FALSE;
		}

		if (preg_match('/\D/s', $value)) {
			return FALSE;
		}

		$clean = preg_replace('/\D/s', '', $value);

		if ($clean == '' || $clean != $value) {
			return FALSE;
		}

		return TRUE;
	}

}
