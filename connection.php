<?php
	class Db {
		private static $instance = NULL;

		private function __construct() {}

		private function __clone() {}

		public static function getInstance() {
			if (!isset(self::$instance)) {
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO('mysql:host=localhost;dbname=host1383157_cbr', 'root', '', $pdo_options);
				//self::$instance = new PDO('mysql:host=localhost;dbname=host1383157_cbr', 'host1383157_cbr', '123123', $pdo_options);
			}
			return self::$instance;
		}
		
	}
