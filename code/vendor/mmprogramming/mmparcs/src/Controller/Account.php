<?php
namespace MMProgramming\MMParcs\Controller;

class Account extends \MMProgramming\MMParcs\Controller\AppController {
		
	public function __construct($route, $noticeBoard)
	{
		// Call parent constructor
		parent::__construct($route, $noticeBoard);
		
		// Set modelName & load model and DAL - Need to do it manually because of name 
		// doesn't correspond to User model and dal
		$this->modelName = $this->initModelName($this);
		$this->model = new \MMProgramming\MMParcs\Model\User($this->noticeBoard);
		
		// Create provider
		$this->provider = $this->createProvider($this->noticeBoard);
		
		// Create DAL
		$this->dal = new \MMProgramming\MMParcs\Dal\User($this->model, $this->provider);
		
	}
	
	public function creatingOne(){
		return $this->view($this->modelName, 'CreatingOne', null);
	}
	
	public function createOne(){
		$this->model->setName(filter_input(INPUT_POST, 'account-name', FILTER_SANITIZE_STRING));
		$this->model->setEmail(filter_input(INPUT_POST, 'account-email', FILTER_SANITIZE_STRING));
		
		//Hash the password
		$password = filter_input(INPUT_POST, 'account-password', FILTER_SANITIZE_STRING);
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		$this->model->setPassword($hashedPassword);
		
		$this->dal->createOne();
		
		return $this->view($this->modelName, 'CreateSuccess', null);		
	}
	
	public function loggingIn(){
		
		//var_dump($this->model);		
		
		return $this->view($this->modelName, 'LoggingIn', $this->model);
	}
	
	public function login(){
		
		$userEmail = filter_input(INPUT_POST, 'account-email', FILTER_SANITIZE_STRING);
		$userPassword = filter_input(INPUT_POST, 'account-password', FILTER_SANITIZE_STRING);
		
		
		$authentication = new \MMProgramming\MMParcs\Authentication($this->noticeBoard, 
							new \ModernWays\Identity\Session($this->noticeBoard, $this->dal), $this->dal);
							
		if($authentication->login($userEmail, $userPassword)){
			
			return $this->view($this->modelName, 'LoginSuccess', null);			
			
		}else{
			$this->model->setAuthFailedMessage();
			return $this->loggingIn();
		}		
	}
	
	public function logout(){
			
		$session = new \ModernWays\Identity\Session($this->noticeBoard);
        $session->end();
        return $this->view($this->modelName,'LogoutSuccess', null);
	}
}