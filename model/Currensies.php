<?php

class Currensies extends Model
{
	
	public function __construct($params = array()){}
	
	public function setListToDb() {
		$xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');
		$db = Db::getInstance();
		$sql = $db->prepare("INSERT INTO currensies SET NumCode = ?, CharCode = ?, Name = ?");
		foreach ($xml as $xmlelem){
			$currency = array((int)$xmlelem->NumCode, (string)$xmlelem->CharCode, (string)$xmlelem->Name);
			$sql->execute($currency);
		}
	}
	
}

?>