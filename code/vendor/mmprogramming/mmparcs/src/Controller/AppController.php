<?php
namespace MMProgramming\MMParcs\Controller;

class AppController extends \MMProgramming\MMParcs\Controller\DalController {
		
	public function __construct($route, $noticeBoard)
	{
		// Call parent constructor
		parent::__construct($route, $noticeBoard);	
	}
	
	public function isAuthenticated(){
		$provider = $this->createProvider($this->noticeBoard);
		$model = new \MMProgramming\MMParcs\Model\User($this->noticeBoard);
		$dal = new \MMProgramming\MMParcs\Dal\User($model, $provider);
		
		$authentication = new \MMProgramming\MMParcs\Libraries\Authentication($this->noticeBoard, 
								new \ModernWays\Identity\Session($this->noticeBoard), $dal);
								
		return $authentication->isLoggedIn();
	}	
}