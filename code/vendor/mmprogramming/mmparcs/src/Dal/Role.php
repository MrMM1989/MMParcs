<?php
namespace MMProgramming\MMParcs\Dal;
class Role extends \ModernWays\AnOrmApart\Dal {
	public function __construct(\MMProgramming\MMParcs\Model\Role $model, \ModernWays\AnOrmApart\Provider $provider) {
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
				$insertSql = 'INSERT INTO Role (Name, Description) VALUES (:name, :description)';
				$preparedStatement = $this -> provider -> getPdo() -> prepare($insertSql);
				$preparedStatement -> bindValue(':name', $this -> model -> getName(), \PDO::PARAM_STR);
				$preparedStatement -> bindValue(':description', $this -> model -> getDescription(), \PDO::PARAM_STR);
				
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
	
	public function updateOne(){
		
		if (!$this->provider->isConnected()) {
                $this->provider->open();
            }
            if ($this->provider->isConnected()) {
                try {
                    
					
					
					//Prepare the statement
					$updateSql = 'UPDATE Role SET Name = :name, Description = :description WHERE Id = :id';
					$preparedStatement = $this->provider->getPdo() -> prepare($updateSql);
					$preparedStatement -> bindValue(':id', $this->model -> getId(), \PDO::PARAM_INT);
					$preparedStatement -> bindValue(':name', $this -> model -> getName(), \PDO::PARAM_STR);
					$preparedStatement -> bindValue(':description', $this -> model -> getDescription(), \PDO::PARAM_STR);
					
					//Execute statement
					$result = $preparedStatement -> execute();					
					
					
                } catch (\PDOException $e) {
                    $this->model->getModelState()->crudNotice('UpdateOne', false, $this, $e, null);
                }
            } else {
                $this->model->getModelState()->disconnected($this->provider);
            }
		
	}
}
