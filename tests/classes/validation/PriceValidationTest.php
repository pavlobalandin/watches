<?php
namespace Gamee\Validation;

class PriceValidationTest extends AbstractValidationTest
{
	protected function getValidator($validField)
	{
		return new PriceValidation($validField);
	}

	public function providerGeneral()
	{
		return [
			['555', TRUE],
			[555, TRUE],
			[0xa, TRUE],
			['-555', FALSE],
			['+555', FALSE],
			[1e-1, FALSE],
			[NULL, FALSE],
			[TRUE, FALSE],
			['', FALSE],
		];
	}
}