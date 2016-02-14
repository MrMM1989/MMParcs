<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 21:06
 */
namespace ModernWays\Webshop\Controller;

class Supplier
{
    public function Editing()
    {
        $model = new \ModernWays\Webshop\Model\Supplier();
        return new \ModernWays\Webshop\View\Supplier($model);
    }
}