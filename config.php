<?php

$config = array(
	'db' => array(
		'driver' => 'mysql',
		'host' => 'localhost',
		'user' => 'root',
		'pass' => 'root',
		'db' => 'users',
		'charset' => 'utf8',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]
	)
);

return $config;
