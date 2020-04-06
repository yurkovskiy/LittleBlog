<?php

return [
	'default' => [
		'type'       => 'PDO',
		'connection' => [
			/**
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'dsn'        => 'mysql:host=localhost;dbname=blog;charset=utf8',
			'username'   => 'bloguser',
			'password'   => '5rav_Pe5',
			'persistent' => FALSE,
		],
		/**
		 * The following extra options are available for PDO:
		 *
		 * string   identifier  set the escaping identifier
		 */
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	],
];
