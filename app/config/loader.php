<?php
include __DIR__ . '/../../vendor/autoload.php';
include __DIR__ . '/config.php';

// simulate some framework
spl_autoload_register(function ($name)
{
	$classPath = dirname(__DIR__) . '/classes';

	$names = explode('\\', $name);
	$file = array_pop($names);
	$dir = strtolower(array_pop($names));

	$filename = $classPath . '/' . $dir . '/' . $file . '.php';

	if (file_exists($filename)) {
		require_once($filename);
		return;
	}
});