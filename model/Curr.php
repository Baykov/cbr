<?php
 
class Curr extends Model{
	
	public function __construct($params = array()){}
	
	public function start($data)
	{
		$id = $data['id'];
		$db = Db::getInstance();
		$sqlSel = $db->prepare('SELECT stat.*, cur.Name as CurName FROM currensies_stat as stat LEFT JOIN currensies as cur ON cur.NumCode = stat.NumCode WHERE stat.NumCode = ? ORDER BY stat.Date');
		$sqlSel->execute(array($id));
		$returnArray = array();
		foreach($sqlSel->fetchAll() as $currency) {
			$returnArray['list'][] = $currency;
		}

		$stringRequest = 'http://www.cbr.ru/scripts/XML_daily.asp';

		$xml = simplexml_load_file($stringRequest);

		foreach ($xml as $xmlelem){
			if($xmlelem->NumCode == $id){
				$returnArray['today'] = array((int)$xmlelem->NumCode, (string)$xmlelem->Nominal, (string)$xmlelem->Value);
			}
		}

		return $returnArray;

	}
	
}

?>