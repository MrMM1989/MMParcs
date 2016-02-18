<?php
namespace MMProgramming\MMParcs;

class Authentication {

	private $session;
	private $noticeboard;
	private $user;
	private $loginAttempts;

	public function __construct($noticeboard, \ModernWays\Identity\Session $session, \MMProgramming\MMParcs\Dal\User $user) {

		$this -> noticeboard = $noticeboard;
		$this -> noticeboard -> setType('AUTHENTICATION');
		$this -> session = $session;
		$this -> user = $user;
		//$this->loginAttempts = $_SESSION['loginAttempts'];
		$this->loginAttempts = 0;
	}

	private function isBruteForceAttack() {
		$this -> noticeboard -> startTimeInKey('Authentication brute force attack?');
		if ($this -> loginAttempts > 10) {
			$this -> noticeboard -> setText('Maximum login attemps exceeded.');
			$this -> noticeboard -> log();
			return true;
		}
		$this -> noticeboard -> setText('Maximum login attemps not exceeded.');
		$this -> noticeboard -> log();
		return false;
	}

	public function login($inputEmail, $inputPassword) {

		if ($this -> isBruteForceAttack()) {
			// user is locked out
			return false;
		} else {

			//Check if user exists
			if ($credentials = $this -> user -> readUserCredentials($inputEmail)) {

				if (password_verify($inputPassword, $credentials['Password'])) {
					$this->session->setTicket($credentials['Password']);
					$this->session->setPositiveInteger('UserId', $credentials['Id']);
					$this->session->setText('UserName', $credentials['Name']);
					$this->session->setText('UserEmail', $credentials['Email']);
					return true;
				} else {
					$this->loginAttempts++;
					return false;
				}

			} else {
				$this->loginAttempts++;
				return false;
			}
		}
	}

}
