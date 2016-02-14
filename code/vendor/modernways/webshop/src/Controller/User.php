<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 27/12/2015
 * Time: 22:57
 */
namespace ModernWays\Webshop\Controller;

class User extends \ModernWays\Mvc\Controller
{
    public function creatingOne()
    {
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $dal->readingAll();
        return $this->view('User', 'CreatingOne', $model);
    }

    public function createOne()
    {
        // var_dump($_POST);
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $model->setAuthenticated(true);
        $model->setEmail(filter_input(INPUT_POST, 'User-Email', FILTER_SANITIZE_STRING));
        $model->setFirstLogin(date('Y-m-d H:i:s'));
        $model->setLastActivity(date('Y-m-d H:i:s'));
        $model->setLockedOut(filter_input(INPUT_POST, 'User-LockedOut', FILTER_VALIDATE_BOOLEAN));
        $model->setUserName(filter_input(INPUT_POST, 'User-UserName', FILTER_SANITIZE_STRING));
        $model->setPassword(filter_input(INPUT_POST, 'User-Password', FILTER_SANITIZE_STRING));
        $dal->createOne();
        // Refresh list
        $dal->readingAll();
        // naar readingOne om de rollen toe te voegen
        return $this->readingOne($model->getId());
    }

    public function editing()
    {
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $dal->readingAll();
        return $this->view('User', 'Editing', $model);
    }

    public function readingOne($id = null)
    {
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $id = $id == null ? $this->route->getId() : $id;
        $model->setId($id);
        $dal->readingOne();
        $dal->readingAll();
        // Read roles
        $model->setRoleList($dal->reading('Role', 'Name, Id', null, false));
        $model->setUserRoleList($dal->reading('UserRole', 'UserRoleSelectByUserId', "UserId = $id", true));
        return $this->view('User', 'ReadingOne', $model);
    }

    public function updatingOne()
    {
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'User-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->readingOne();
        $dal->readingAll();
        // read all roles
        // Read roles
        $model->setRoleList($dal->reading('Role', 'Name, Id', null, false));
        return $this->view('User', 'UpdatingOne', $model);
    }

    public function updateOne()
    {
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'User-Id', FILTER_SANITIZE_NUMBER_INT));
        $model->setUserName(filter_input(INPUT_POST, 'User-UserName', FILTER_SANITIZE_STRING));
        $model->setEmail(filter_input(INPUT_POST, 'User-Email', FILTER_SANITIZE_STRING));
        $model->setPassword(filter_input(INPUT_POST, 'User-Password', FILTER_SANITIZE_STRING));
        $model->setLastActivity(filter_input(INPUT_POST, 'User-LastActivity', FILTER_SANITIZE_STRING));
        $model->setFirstLogin(filter_input(INPUT_POST, 'User-FirstLogin', FILTER_SANITIZE_STRING));
        $model->setAuthenticated(filter_input(INPUT_POST, 'User-Authenticated', FILTER_SANITIZE_NUMBER_INT));
        $model->setLockedOut(filter_input(INPUT_POST, 'User-LockedOut', FILTER_SANITIZE_NUMBER_INT));
        $dal->updateOne();
        return $this->readingOne(filter_input(INPUT_POST, 'User-Id', FILTER_SANITIZE_NUMBER_INT));

    }

    public function deleteOne()
    {
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'User-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->deleteOne();
        $this->editing();
    }

    public function addOneRole()
    {
        $model = new \ModernWays\Identity\Model\UserRole($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\UserRole($model, $provider);
        $model->setUserId(filter_input(INPUT_POST, 'User-Id', FILTER_SANITIZE_NUMBER_INT));
        $model->setRoleId($this->route->getId());
        $dal->createOne();
        return $this->readingOne(filter_input(INPUT_POST, 'User-Id', FILTER_SANITIZE_NUMBER_INT));
    }

    public function deleteOneRole()
    {
        $model = new \ModernWays\Identity\Model\UserRole($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\UserRole($model, $provider);
        $model->setId($this->route->getId());
        $dal->deleteOne();
        return $this->readingOne(filter_input(INPUT_POST, 'User-Id', FILTER_SANITIZE_NUMBER_INT));
    }
}
