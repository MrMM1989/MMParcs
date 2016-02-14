<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 21:06
 */
namespace ModernWays\Webshop\Controller;

class Home extends \ModernWays\Mvc\Controller
{
    public function Index()
    {
        return $this->view('Home', 'Index', null);
    }
}