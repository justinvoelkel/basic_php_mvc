<?php
/**
 * Created by PhpStorm.
 * User: justinvoelkel
 * Date: 1/22/15
 * Time: 8:31 PM
 */

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([

    'driver'=>'mysql',
    'host'=>'localhost',
    'username'=> 'root',
    'password'=> 'root',
    'database'=> 'website',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''

]);

$capsule->bootEloquent();