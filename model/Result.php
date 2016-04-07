<?php

class Result {
	
	public $message = array();
	
	public function __construct($params = array()){}
	
	function start($data = null){
		if(!empty($data)){
			if(!empty($data['date'])){
				$date = $data['date'];
				$this->parseOneDate($date);
			} else {
				$today = new DateTime();
				$today->sub(new DateInterval('P30D'));
				for($i=0; $i<30; $i++){
					$date = $today->format("d/m/Y");//22/12/2002
					$this->parseOneDate($date);
					$today->modify('+1 day');
				}
			}
		}
		return $this->message;
	}
	
	function parseOneDate($date){
		$db = Db::getInstance();
		
		$startTime = microtime(true);
		$stringRequest = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req='.$date;

		$stringResponse = json_encode(get_headers($stringRequest)); 
		
		$xml = simplexml_load_file($stringRequest);
		$dateStat = date("Y-m-d H:i:s", strtotime($xml['Date']));
		
		$sqlSel = $db->prepare("SELECT id FROM currensies_stat WHERE Date = ?");
		$sqlSel->execute(array($dateStat));
		$dateExist = $sqlSel->fetchColumn();
		if(!empty($dateExist)){
			$this->message[$date] = "На выбранную дату уже есть данные в базе!";
			return $this->message;
		}
		
		$sqlStat = $db->prepare("INSERT INTO currensies_stat SET NumCode = ?, Nominal = ?, Value = ?, Date = ?");
		foreach ($xml as $xmlelem){
			$currency = array((int)$xmlelem->NumCode, (string)$xmlelem->Nominal, (string)$xmlelem->Value, (string)$dateStat);
			$sqlStat->execute($currency);
		}
		$endTime = microtime(true);
		
		$sqlLogs = $db->prepare("INSERT INTO logs SET request = ?, date_request = ?, date_response = ?, code_answer = ?");
		$log = array($stringRequest, (string)$startTime, (string)$endTime, (string)$stringResponse);
		$sqlLogs->execute($log);
		$this->message[$date] = "Успешно обработано!";
	}

}

?>