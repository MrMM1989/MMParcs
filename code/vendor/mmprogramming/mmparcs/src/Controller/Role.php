<?php
namespace MMProgramming\MMParcs\Controller;

class Role extends \MMProgramming\MMParcs\Controller\DalController {
		
	public function __construct($route, $noticeBoard)
	{
		// Call parent constructor
		parent::__construct($route, $noticeBoard);
		
		// Set modelName & load model and DAL
		$this->modelName = $this->initModelName($this);
		$this->loadModel($this->noticeBoard);
		$this->loadDal($this->noticeBoard);
	}	
	
	public function index(){
		
		$this->dal->readingAll();		
		return $this->view($this->modelName, 'Index', $this->model);
	}
	
	public function creatingOne(){
		
		return $this->view('Role', 'creatingOne', null);
	}
	
	public function createOne(){
		
		$this->model->setName(filter_input(INPUT_POST, 'role-name', FILTER_SANITIZE_STRING));
		$this->model->setDescription(filter_input(INPUT_POST, 'role-description', FILTER_SANITIZE_STRING));
		
		$this->dal->createOne();
		$this->dal->readingAll();
		$this->model->setCreateSuccesMessage();
		return $this->view($this->modelName, 'Index', $this->model);
	}
	
	public function readingOne()
	{
		$this->model->setId($this->route->getId());
		$this->dal->readingOne();
		return $this->view($this->modelName, 'ReadingOne', $this->model);
	}
	
	public function updatingOne()
	{
		$this->model->setId($this->route->getId());
		$this->dal->readingOne();
		return $this->view($this->modelName, 'UpdatingOne', $this->model);
	}
	
	public function updateOne()
	{
		$this->model->setId(filter_input(INPUT_POST, 'role-id', FILTER_SANITIZE_NUMBER_INT));
		$this->model->setName(filter_input(INPUT_POST, 'role-name', FILTER_SANITIZE_STRING));
		$this->model->setDescription(filter_input(INPUT_POST, 'role-description', FILTER_SANITIZE_STRING));
	
			
		$this->dal->updateOne();
		$this->dal->readingAll();
		$this->model->setUpdateSuccesMessage();
		return $this->view($this->modelName, 'Index', $this->model);
	}
}
