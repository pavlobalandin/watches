<?php
namespace Gamee\Model;

use Gamee\Strategy\JsonStrategy;

class WatchTest extends \PHPUnit_Framework_TestCase
{
	public function testGeneral()
	{
		$model = new Watch(new JsonStrategy());
		$model->load(__DIR__ . '/../../data/params_watch.json');

		$this->assertEquals("Prim", $model->getTitle());
		$this->assertEquals("250000", $model->getPrice());
		$this->assertEquals("A watch with a water fountain picture", $model->getDescription());
		$this->assertInstanceOf('\Gamee\Model\FountainParam', $model->getFountain());
	}

	/**
	 * @expectedException \Gamee\Exception\LoadException
	 * @expectedExceptionMessageRegExp /No such file or directory/
	 */
	public function testException()
	{
		$model = new Watch(new JsonStrategy());
		$model->load(__DIR__ . '/../../data/some_unexisting.json');
	}
}