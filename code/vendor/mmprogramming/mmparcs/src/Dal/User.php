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
				$insertSql = 'INSERT INTO User (FirstName, LastName, Email, Password, DateRegistration, RoleId) 
												VALUES (:firstname, :lastname, :email, :password, NOW(), 
												(SELECT CValue FROM Configuration WHERE CKey = "UserRole"))';
				$preparedStatement = $this -> provider -> getPdo() -> prepare($insertSql);
				$preparedStatement -> bindValue(':firstname', $this -> model -> getFirstName(), \PDO::PARAM_STR);
				$preparedStatement -> bindValue(':lastname', $this -> model -> getLastName(), \PDO::PARAM_STR);
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

	public function readingOne() {

		$result = false;
		if (!$this -> provider -> isConnected()) {
			$this -> provider -> open();
		}
		if ($this -> provider -> isConnected()) {
			try {
					
				$selectSql = 'SELECT * FROM vwReadUserRole WHERE Id = :id';	
				$preparedStatement = $this -> provider -> getPdo() -> prepare($selectSql);
				$preparedStatement -> bindValue(':id', $this -> model -> getId(), \PDO::PARAM_INT);
				$preparedStatement -> execute();
				
				// fetch the output
				$array = $preparedStatement -> fetch(\PDO::FETCH_ASSOC);
				

				if ($array) {
					
					// We fake that we fetch the password from the database;
					$array['Password'] = '';
					
					foreach ($this->modelClassFieldNames as $fieldName) {
						$columnName = ucfirst($fieldName -> getName());
						$reflectionMethod = new \ReflectionMethod($this -> modelClassName, "set{$columnName}");
						$reflectionMethod -> invoke($this -> model, $array[$columnName]);
						// echo $reflectionMethod->invoke($this->model);
					}
					$this -> model -> getModelState() -> crudNotice("ReadingOne Id {$this->model->getId()}", true, $this, null, $preparedStatement -> errorInfo());
					//Since column in the where must be primary key
					// rowCount() should return 1. Can be used as validation.
					$this -> rowCount = $preparedStatement -> rowCount();
					$result = ($preparedStatement -> rowCount() == 1);
				} else {
					$this -> model -> getModelState() -> crudNotice("ReadingOne Id {$this->model->getId()}", false, $this, null, $preparedStatement -> errorInfo());
				}
			} catch (\PDOException $e) {
				$this -> model -> getModelState() -> crudNotice("ReadingOne Id {$this->model->getId()}", true, $this, $e);
			}
		} else {
			$this -> model -> getModelState() -> notconnected($this -> provider);
		}
		return $result;
	}

	public function readUserCredentials($email) {
		$result = false;
		if (!$this -> provider -> isConnected()) {
			$this -> provider -> open();
		}
		if ($this -> provider -> isConnected()) {
			try {

				//Prepare statement
				$credentialSql = 'SELECT Id, FirstName, Email, Password FROM User WHERE Email = :email LIMIT 1';
				$preparedStatement = $this -> provider -> getPdo() -> prepare($credentialSql);
				$preparedStatement -> bindValue(':email', $email, \PDO::PARAM_STR);

				//Execute statement
				$preparedStatement -> execute();

				//Fetch result
				$result = $preparedStatement -> fetch(\PDO::FETCH_ASSOC);
				$this -> model -> getModelState() -> crudNotice("ReadUserCredentials Email {$this->model->getEmail()}", true, $this);
			} catch (\PDOException $e) {
				$this -> model -> getModelState() -> crudNotice("ReadUserCredentials Email {$this->model->getEmail()}", false, $this, $e);
			}
		} else {
			$this -> model -> getModelState() -> notconnected($this -> provider);
		}
		return $result;
	}

}
