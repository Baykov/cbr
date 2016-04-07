<?php

require_once('connection.php');
require_once('model/Currency.php');

class Model {

	public function start($data = null) {
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM currensies');
		foreach($req->fetchAll() as $currency) {
			$list[] = new Currency($currency['NumCode'], $currency['CharCode'], $currency['Name']);
		}
		return $list;
	}
}

?>