<?php
namespace MMProgramming\MMParcs\Controller;

class Zone extends \MMProgramming\MMParcs\Controller\DalController {
	
	public function __construct($route, $noticeBoard)
	{
		// Call parent constructor
		parent::__construct($route, $noticeBoard);
		
		// Set modelName & load model and DAL
		$this->modelName = $this->initModelName($this);
		$this->loadModel($this->noticeBoard);
	}
	
	public function index()
	{
		echo 'Zone - index';
	}
}