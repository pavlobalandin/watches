<?php
namespace Gamee\Strategy;

class JsonStrategyTest extends AbstractStrategyTest
{
	/**
	 * @return StrategyInterface
	 */
	protected function getStrategy()
	{
		return new JsonStrategy();
	}

	/**
	 * @return string
	 */
	protected function getValidPayload()
	{
		return json_encode([
			'some array' => 'some val',
		]);
	}

	/**
	 * @return string
	 */
	protected function getInvalidPayload()
	{
		return json_encode([
			'some array' => 'some val',
		]) . ';';
	}
}