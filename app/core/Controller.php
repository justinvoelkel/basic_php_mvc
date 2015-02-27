<?php
/**
 * Created by PhpStorm.
 * User: justinvoelkel
 * Date: 1/11/15
 * Time: 8:24 PM
 */

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view,$data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}