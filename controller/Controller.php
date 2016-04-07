<?php
include_once("model/Model.php");

class Controller {
	public $model;
	public $view;
	public $action;
	public $result;
	public $data;
	
	public function __construct()  
    {  
        $this->model 	= new Model();
        $this->view 	= 'Currensies';
        $this->action 	= 'start';
        $this->result 	= array();
        $this->data 	= array();
    } 
	
	public function execute()
	{
		$this->data 	= $_REQUEST;
		if(!empty($_GET['action'])){
			$this->action = $_GET['action'];
		}
		if(!empty($_REQUEST['view'])){
			$this->view = $_REQUEST['view'];
			include_once("model/$this->view.php");
			$this->model = new $this->view();
			$this->result = $this->model->{ $this->action }($this->data);
		} else {
			$this->result = $this->model->{ $this->action }($this->data);
		}
		include 'view/default.php';
	}
}

?>