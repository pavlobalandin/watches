<?php
namespace Gamee\Strategy;

abstract class AbstractStrategyTest extends \PHPUnit_Framework_TestCase
{
	public function testValid()
	{
		$strategy = $this->getStrategy();
		$this->assertTrue($strategy->loadFromString($this->getValidPayload()));
		$this->assertNull($strategy->getException());
	}

	public function testInvalid()
	{
		$strategy = $this->getStrategy();
		$this->assertFalse($strategy->loadFromString($this->getInvalidPayload()));
		$this->assertInstanceOf('\Gamee\Exception\LoadException', $strategy->getException());
	}

	/**
	 * @return StrategyInterface
	 */
	abstract protected function getStrategy();

	/**
	 * @return string
	 */
	abstract protected function getValidPayload();

	/**
	 * @return string
	 */
	abstract protected function getInvalidPayload();
}