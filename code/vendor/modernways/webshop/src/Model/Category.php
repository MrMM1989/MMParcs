<?php
/**
 * Created by PhpStorm.
 * User: Jef Inghelbrecht
 * Date: 25/01/2016
 * Time: 21:48
 */
namespace ModernWays\Webshop\Model;

class Category extends \ModernWays\Mvc\Model
{
    private $name;
    private $description;
    private $id;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        if($this->validRequired($name, "Name"))
        {
            $this->name = $name;
        }
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}