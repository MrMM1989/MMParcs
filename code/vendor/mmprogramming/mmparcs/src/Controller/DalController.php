<?php
namespace MMProgramming\MMParcs\Controller;

class DalController extends \ModernWays\Mvc\Controller {
	
	//Provider configuration
	protected $providerName = '';
	
	protected $dal;
	protected $model;
	protected $modelName;
	protected $provider;
	
	public function __construct ($route, $noticeBoard)
	{		
		//Call the parent constructor
		parent::__construct($route, $noticeBoard);
	}
	
	public function initModelName($model)
	{
		$this->modelName = $this->getModelName($model);
		
		return $this->modelName;
	}
	
	public function loadModel($noticeBoard)
	{
		$modelClass = $this->loadModelClass($this->modelName);
		$this->model = new $modelClass($noticeBoard);
		
		return $this->model;
	}
	
	public function loadForeignModel($modelName, $noticeBoard){
		
		$modelClass = $this->loadModelClass($modelName);		
		$model = new $modelClass($noticeBoard);
		
		return $model;		
	}
		
	public function loadDal($noticeBoard)
	{
		// Create provider
		$this->provider = new \ModernWays\AnOrmApart\Provider($this->providerName, $noticeBoard);
		
		// Load DAL
		$dalClass = $this->loadDalClass($this->modelName);
		$this->dal = new $dalClass($this->model, $this->provider);	
		
		return $this->dal;	
	}
	
	public function loadForeignDal($model){
		
		// Get name of the model - Needed for loading the dal
		$modelName = $this->getModelName($model);
		
		// Load DAL
		$dalClass = $this->loadDalClass($modelName);
		$dal = new $dalClass($model, $this->provider);
		
		return $dal;		
	}
	
	private function getModelName($model){
		
		$reflectionClass = new \ReflectionClass($model);		
		return $reflectionClass->getShortName();		
	}
	
	private function loadModelClass($modelName){
		
		$modelClass = '\ModernWays\Webshop\Model\\'.$modelName;
		return $modelClass;		
	}
	
	private function loadDalClass($dalName){
		
		$dalClass = '\ModernWays\Webshop\Dal\\'.$dalName;
		return $dalClass;
	}	
	
}