<?php
require __DIR__ . '/../app/config/loader.php';

use Gamee\Helper\WatchHelper;

main();

function main()
{
	$watches = WatchHelper::loadFromDir(__DIR__ . '/source_samples');

	print_r($watches);
}
