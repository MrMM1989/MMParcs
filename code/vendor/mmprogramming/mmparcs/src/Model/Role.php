<?php
namespace MMProgramming\MMParcs\Model;

class Role extends \ModernWays\Mvc\Model{
	
	private $id;
	private $name;
	private $description;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($value){
		$this->id = $value;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($value){
		$this->name = $value;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setDescription($value){
		$this->description = $value;
	}
	
	public function setCreateSuccesMessage(){
		$this->modelState->start('Rol toegevoegd!');
		$this->modelState->setType('SUCCESS');
		$this->modelState->setText('De rol is succesvol toegevoegd.');
		$this->modelState->log();
	}
	public function setUpdateSuccesMessage(){
		$this->modelState->start('Rol gewijzigd!');
		$this->modelState->setType('SUCCESS');
		$this->modelState->setText('De rol is succesvol gewijzigd.');
		$this->modelState->log();
	}
}