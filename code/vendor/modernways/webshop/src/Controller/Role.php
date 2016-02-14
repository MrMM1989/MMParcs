<?php
/**
 * Created by PhpStorm.
 * User: Jef Inghelbrecht
 * Date: 27/12/2015
 * Time: 22:57
 */
namespace ModernWays\Webshop\Controller;

class Role extends \ModernWays\Mvc\Controller
{
    public function creatingOne()
    {
        $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
        $dal->readingAll();
        return $this->view('Role', 'CreatingOne', $model);
    }

    public function createOne()
    {
        // var_dump($_POST);
        $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
        $model->setName(filter_input(INPUT_POST, 'Role-Name', FILTER_SANITIZE_STRING));
        $model->setDescription(filter_input(INPUT_POST, 'Role-Description', FILTER_SANITIZE_STRING));
        $dal->createOne();
        // Refresh list
        $dal->readingAll();
        return $this->view('Role', 'CreatingOne', $model);
    }

    public function editing()
    {
        $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
        $dal->readingAll();
        return $this->view('Role', 'Editing', $model);
    }

    public function readingOne()
    {
        $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
        $model->setId($this->route->getId());
        $dal->readingOne();
        $dal->readingAll();
        return $this->view('Role', 'ReadingOne', $model);
    }

    public function updatingOne()
    {
        $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Role-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->readingOne();
        $dal->readingAll();
        return $this->view('Role', 'UpdatingOne', $model);
    }

    public function deleteOne()
    {
        $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Role-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->deleteOne();
        $dal->readingAll();
        return $this->view('Role', 'Editing', $model);
    }

    public function updateOne()
    {
        $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Role-Id', FILTER_SANITIZE_NUMBER_INT));
        $model->setName(filter_input(INPUT_POST, 'Role-Name', FILTER_SANITIZE_STRING));
        $model->setDescription(filter_input(INPUT_POST, 'Role-Description', FILTER_SANITIZE_STRING));
        $dal->updateOne();
        $dal->readingAll();
        // read modified record again
        $dal->readingOne();
        return $this->view('Role', 'ReadingOne', $model);
    }
}
