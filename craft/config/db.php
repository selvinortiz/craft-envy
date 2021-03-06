<?php

/**
 * DB configuration file, @see craft/app/etc/config/defaults/db.php
 *
 * 1. Defines base db configs for all (*) and for production (.com) environments
 * 2. Fetches the file with db configs for the local environment
 * 3. Merges base and local db configs or returns the base configs if nothing is found for local
 */
$dbConfig	= array(
	'*'					=> array(
		'server'		=> 'localhost',
		'user'			=> '{user}',
		'password'		=> '{password}',
		'tablePrefix'	=> '{tablePrefix}',
	),
	'.com'				=> array(
		'user'			=> '{liveUsername}',
		'password'		=> '{livePassword}',
		'database'		=> '{liveDatabase}',
	),
);

$envyDbConfig = @include('local/db.php');

return is_array($envyDbConfig) ? array_merge($dbConfig, $envyDbConfig) : $dbConfig;
