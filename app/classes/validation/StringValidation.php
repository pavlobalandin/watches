<?php
namespace Gamee\Validation;

class StringValidation extends Validation implements ValidationInterface
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
		return TRUE;
	}

}
