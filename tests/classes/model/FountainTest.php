<?php
namespace Gamee\Model;

class FountainTest extends \PHPUnit_Framework_TestCase
{
	public function testGeneric()
	{
		$payload = 'some';
		$model = new Fountain($payload);
		$this->assertEquals($payload, $model->getData());
	}

	public function testBin()
	{
		$payload = 'some';
		$model = new FountainBinary(base64_encode($payload));
		$this->assertEquals($payload, $model->getData());
	}

}