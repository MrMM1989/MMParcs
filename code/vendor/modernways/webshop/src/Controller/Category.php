<?php
/**
 * Created by PhpStorm.
 * User: Jef Inghelbrecht
 * Date: 27/12/2015
 * Time: 22:57
 */
namespace ModernWays\Webshop\Controller;

class Category extends \ModernWays\Webshop\Controller\AppController
{
    public function creatingOne()
    {
        $model = new \ModernWays\Webshop\Model\Category($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Category($model, $provider);
        $dal->readingAll();
        return $this->view('Category', 'CreatingOne', $model);
    }

    public function createOne()
    {
        // var_dump($_POST);
        $model = new \ModernWays\Webshop\Model\Category($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Category($model, $provider);
        $model->setName(filter_input(INPUT_POST, 'Category-Name', FILTER_SANITIZE_STRING));
        $model->setDescription(filter_input(INPUT_POST, 'Category-Description', FILTER_SANITIZE_STRING));
        $dal->createOne();
        // Refresh list
        $dal->readingAll();
        return $this->view('Category', 'CreatingOne', $model);
    }

    public function editing()
    {
       /* if ($this->isAuthorized($this->isAuthenticated(), 'Admin')) {*/
            $model = new \ModernWays\Webshop\Model\Category($this->noticeBoard);
            $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
            $dal = new \ModernWays\Webshop\Dal\Category($model, $provider);
            $dal->readingAll();
            return $this->view('Category', 'Editing', $model);
       /* } else {
            return $this->view('Admin', 'Index', null);
        }*/

    }

    public function readingOne()
    {
        $model = new \ModernWays\Webshop\Model\Category($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Category($model, $provider);
        $model->setId($this->route->getId());
        $dal->readingOne();
        $dal->readingAll();
        return $this->view('Category', 'ReadingOne', $model);
    }

    public function updatingOne()
    {
        $model = new \ModernWays\Webshop\Model\Category($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Category($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Category-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->readingOne();
        $dal->readingAll();
        return $this->view('Category', 'UpdatingOne', $model);
    }

    public function deleteOne()
    {
        $model = new \ModernWays\Webshop\Model\Category($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Category($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Category-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->deleteOne();
        $dal->readingAll();
        return $this->view('Category', 'Editing', $model);
    }

    public function updateOne()
    {
        $model = new \ModernWays\Webshop\Model\Category($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Category($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Category-Id', FILTER_SANITIZE_NUMBER_INT));
        $model->setName(filter_input(INPUT_POST, 'Category-Name', FILTER_SANITIZE_STRING));
        $model->setDescription(filter_input(INPUT_POST, 'Category-Description', FILTER_SANITIZE_STRING));
        $dal->updateOne();
        $dal->readingAll();
        // read modified record again
        $dal->readingOne();
        return $this->view('Category', 'ReadingOne', $model);
    }
}
