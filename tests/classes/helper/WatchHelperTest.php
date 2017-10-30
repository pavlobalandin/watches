<?php
namespace Gamee\Helper;

class WatchHelperTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider providerGeneral
	 */
	public function testGeneral($file, $ext)
	{
		$this->assertEquals($ext, WatchHelper::getExtension($file));
	}

	public function testDirRead()
	{
		$watches = WatchHelper::loadFromDir(__DIR__ . '/../../data');
		$this->assertEquals(2, count($watches));
		foreach ($watches as $watch) {
			$this->assertInstanceOf('\Gamee\Model\Watch', $watch);
		}
	}

	/**
	 * @return array
	 */
	public function providerGeneral()
	{
		return [
			['some.txt', 'txt'],
			['some.TxT', 'txt'],
			['some/long/path.TxT', 'txt'],
			['some/long/.path', 'path'],
			['some/long/path', NULL],
			[NULL, NULL],
			[FALSE, NULL],
		];
	}
}