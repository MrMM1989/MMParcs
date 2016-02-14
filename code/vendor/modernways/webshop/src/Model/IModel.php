<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 21:34
 */
namespace ModernWays\Webshop\Model;

interface iModel
{
    public function create();
    public function update();
    public function delete();
    public function readOne();
    public function readAll();
}