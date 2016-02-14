<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 21:30
 */
namespace ModernWays\Webshop\Model;

class Supplier implements iModel
{
    public function create() {
        return 'Ik heb een supplier toegevoegd';
    }

    public function update() {
        return 'Ik heb een supplier geüpdated';
    }

    public function delete() {
        return 'Ik heb een supplier gedeleted';
    }

    public function readOne() {
        return 'Ik heb een supplier ingelezen';
    }

    public function readAll() {
        return 'Ik heb alle leveranciers ingelezen';
    }
}