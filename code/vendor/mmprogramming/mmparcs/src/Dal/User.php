<?php
namespace MMProgramming\MMParcs\Dal;
class User extends \ModernWays\AnOrmApart\Dal {
	public function __construct(\MMProgramming\MMParcs\Model\User $model, \ModernWays\AnOrmApart\Provider $provider) {
		$this -> model = $model;
		parent::__construct($provider);
	}
	
	public function createOne() {
		$result = false;
		if (!$this -> provider -> isConnected()) {
			$this -> provider -> open();
		}
		if ($this -> provider -> isConnected()) {
			try {

				//Prepare the statement
				$insertSql = 'INSERT INTO User (Name, Email, Password, DateRegistration) VALUES (:name, :email, :password, NOW())';
				$preparedStatement = $this -> provider -> getPdo() -> prepare($insertSql);
				$preparedStatement -> bindValue(':name', $this -> model -> getName(), \PDO::PARAM_STR);
				$preparedStatement -> bindValue(':email', $this -> model -> getEmail(), \PDO::PARAM_STR);
				$preparedStatement -> bindValue(':password', $this -> model -> getPassword(), \PDO::PARAM_STR);
				
				//Execute statement
				$preparedStatement -> execute();

			} catch (\PDOException $e) {
				$this -> model -> getModelState() -> crudNotice('CreateOne', false, $this, $e, null);
			}
		} else {
			$this -> model -> getModelState() -> disconnected($this -> provider);
		}

		return $result;
	}
	
	public function readUserCredentials($email){
		$result = false;
        if (!$this->provider->isConnected()) {
            $this->provider->open();
        }
        if ($this->provider->isConnected()) {
            try {
            	  		
            	  	//Prepare statement
                	$credentialSql = 'SELECT Id, Name, Email, Password FROM User WHERE Email = :email LIMIT 1';
					$preparedStatement = $this->provider->getPdo()->prepare($credentialSql);
					$preparedStatement -> bindValue(':email', $email, \PDO::PARAM_STR);
					
					//Execute statement
					$preparedStatement->execute();
					
					//Fetch result
					$result = $preparedStatement->fetch(\PDO::FETCH_ASSOC);									
					$this->model->getModelState()->crudNotice("ReadUserCredentials Email {$this->model->getEmail()}", true, $this);				
                }
            catch (\PDOException $e) {
                $this->model->getModelState()->crudNotice("ReadUserCredentials Email {$this->model->getEmail()}", false, $this, $e);
            }
        } else {
            $this->model->getModelState()->notconnected($this->provider);
        }
        return $result;
	}
}