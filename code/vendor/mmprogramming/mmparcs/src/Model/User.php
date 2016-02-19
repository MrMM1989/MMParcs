<?php
namespace MMProgramming\MMParcs\Model;

class User extends \ModernWays\Mvc\Model{
	
	private $id;
	private $firstName;
	private $lastName;
	private $email;
	private $password;
	private $dateRegistration;
	private $dateLastLogin;
	private $isBanned;
	private $roleId;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($value){
		$this->id = $value;
	}
	
	public function getFirstName(){
		return $this->firstName;
	}
	
	public function setFirstName($value){
		$this->firstName = $value;
	}
	
	public function getLastName(){
		return $this->lastName;
	}
	
	public function setLastName($value){
		$this->lastName = $value;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($value){
		$this->email = $value;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($value){
		$this->password = $value;
	}
	
	public function getDateRegistration(){
		return $this->dateRegistration;
	}
	
	public function setDateRegistration($value){
		$this->dateRegistration = $value;
	}
	
	public function getDateLastLogin(){
		return $this->dateLastLogin;
	}
	
	public function setDateLastLogin($value){
		$this->dateLastLogin = $value;
	}
	
	public function getIsBanned(){
		return $this->isBanned;
	}
	
	public function setIsBanned($value){
		$this->isBanned = $value;
	}
	
	public function getRoleId(){
		return $this->roleId;
	}
	
	public function setRoleId($value){
		$this->roleId = $value;
	}
	
	public function setAuthFailedMessage(){
		$this->modelState->start('Inloggen gefaald!');
		$this->modelState->setType('AUTH-FAILED');
		$this->modelState->setText('De inloggegevens zijn niet correct. Probeer opnieuw!');
		$this->modelState->log();
	}
}