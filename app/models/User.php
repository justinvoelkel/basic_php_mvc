<?php
/**
 * Created by PhpStorm.
 * User: justinvoelkel
 * Date: 1/13/15
 * Time: 9:17 PM
 */
use Illuminate\Database\Eloquent\Model as Eloquent;
class User extends Eloquent{
    Public $name;
    protected $fillable = ['username','password'];
}