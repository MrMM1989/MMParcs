<?php
namespace MMProgramming\MMParcs\Model;

class Zone extends \ModernWays\Mvc\Model{
	
	private $id;
	private $name;
	private $address;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($value)
	{
		$this->id = $value;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($value)
	{
		$this->name = $value;
	}
	
	public function getAddress()
	{
		return $this->address;
	}
	
	public function setAddress($value)
	{
		$this->address = $value;
	}
}
