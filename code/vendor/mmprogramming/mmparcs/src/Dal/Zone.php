<?php
namespace MMProgramming\MMParcs\Dal;
class Zone extends \ModernWays\AnOrmApart\Dal {
	public function __construct(\MMProgramming\MMParcs\Model\Zone $model, \ModernWays\AnOrmApart\Provider $provider) {
		$this -> model = $model;
		parent::__construct($provider);
	}
}
