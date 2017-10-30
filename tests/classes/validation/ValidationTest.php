<?php
namespace Gamee\Validation;

class ValidationTest extends AbstractValidationTest
{
	/**
	 * @param string $validField
	 * @return ValidationInterface
	 */
	protected function getValidator($validField)
	{
		return new Validation($validField);
	}

	/**
	 * @return array
	 */
	public function providerGeneral()
	{
		return [
			['some', TRUE],
			['', TRUE],
			[55, TRUE],
			[NULL, FALSE],
			[FALSE, FALSE],
		];
	}
}