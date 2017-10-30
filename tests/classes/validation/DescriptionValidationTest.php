<?php
namespace Gamee\Validation;

class DescriptionValidationTest extends AbstractValidationTest
{
	/**
	 * @param string $validField
	 * @return ValidationInterface
	 */
	protected function getValidator($validField)
	{
		return new DescriptionValidation($validField);
	}

	/**
	 * @return array
	 */
	public function providerGeneral()
	{
		return [
			[str_repeat('a', DescriptionValidation::MIN_LENGTH), TRUE],
			[substr(str_repeat('a', DescriptionValidation::MIN_LENGTH), 1), FALSE],
			[NULL, FALSE],
			[FALSE, FALSE],
		];
	}
}