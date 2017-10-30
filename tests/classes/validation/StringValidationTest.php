<?php
namespace Gamee\Validation;

class StringValidationTest extends AbstractValidationTest
{
	/**
	 * @param string $validField
	 * @return ValidationInterface
	 */
	protected function getValidator($validField)
	{
		return new StringValidation($validField);
	}

	/**
	 * @return array
	 */
	public function providerGeneral()
	{
		return [
			['some', TRUE],
			[555, TRUE],
			[NULL, FALSE],
			[FALSE, FALSE],
		];
	}
}