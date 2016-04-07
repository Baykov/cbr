<?php

class Currency {
	public $NumCode;
	public $CharCode;
	public $Name;
	
	public function __construct($NumCode, $CharCode, $Name) {  
		$this->NumCode = $NumCode;
		$this->CharCode = $CharCode;
		$this->Name = $Name;
	} 
}
?>