<?php
namespace MMProgramming\MMParcs\Libraries;

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
		$this -> loginAttempts = 0;
	}

	public function getUserEmail() {
		return $this -> session -> get('UserEmail');
	}

	public function login($inputEmail, $inputPassword) {

		if ($this -> isBruteForceAttack()) {
			// user is locked out
			return false;
		} else {

			//Check if user exists
			if ($credentials = $this -> user -> readUserCredentials($inputEmail)) {

				if (password_verify($inputPassword, $credentials['Password'])) {
					$this -> session -> setTicket($credentials['Password']);
					$this -> session -> setPositiveInteger('UserId', $credentials['Id']);
					$this -> session -> setText('UserName', $credentials['Name']);
					$_SESSION['UserEmail'] = $credentials['Email'];
					return true;
				} else {
					$this -> loginAttempts++;
					return false;
				}

			} else {
				$this -> loginAttempts++;
				return false;
			}
		}
	}

	public function isLoggedIn() {
		$isLoggedIn = false;
		
		
		if ($credentials = $this -> user -> readUserCredentials($this -> getUserEmail())) {

			if($this->verifyTicket($credentials['Password'])){
				
				//Logged in
				$isLoggedIn = true;
				
			}else {
				
				//Not logged in
				$isLoggedIn = false;
			}

		} else {
			//User isn't found
			$isLoggedIn = false;
		}
		return $isLoggedIn;
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

	private function verifyTicket($hashedPasswordOutput) {
		$this -> noticeboard -> startTimeInKey('Authentication verify ticket');
		$ticket = $this -> session -> get('t');
		$ticketToCheck = $this -> session -> makeTicket($hashedPasswordOutput);
		if ($ticket === $ticketToCheck) {
			$this -> noticeboard -> setText('Ticket is verified.');
			$this -> noticeboard -> log();
			return true;
		}
		$this -> noticeboard -> setText('Ticket is not verified.');
		$this -> noticeboard -> log();
		return false;
	}

}
