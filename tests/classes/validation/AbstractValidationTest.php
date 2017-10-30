<?php
namespace Gamee\Validation;

abstract class AbstractValidationTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider providerGeneral
	 *
	 * @param $value
	 * @param $isValid
	 */
	public function testGeneral($value, $isValid)
	{
		$validField = 'some';
		$validator = $this->getValidator($validField);

		$input = [
			$validField => $value,
		];

		$invalidInput = [
			'another' => $value,
		];

		$this->assertEquals($isValid, $validator->isValid($input));
		$this->assertFalse($validator->isValid($invalidInput));
	}

	/**
	 * @return array
	 */
	abstract public function providerGeneral();

	/**
	 * @param string $validField
	 * @return ValidationInterface
	 */
	abstract protected function getValidator($validField);
}