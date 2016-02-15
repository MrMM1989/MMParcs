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
		$this->loadDal($this->noticeBoard);
	}
	
	public function index()
	{
		$this->dal->readingAll();
		return $this->view($this->modelName, 'Index', $this->model);
	}
	
	public function readingOne()
	{
		$this->model->setId($this->route->getId());
		$this->dal->readingOne();
		return $this->view($this->modelName, 'ReadingOne', $this->model);
	}
}