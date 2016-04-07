<?php

class Logs extends Model{
	
	public function __construct($params = array()){}
	
	public function start($data) {
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM logs');
		foreach($req->fetchAll() as $log) {
			$list[] = $log;
		}
		return $list;
	}
}

?>