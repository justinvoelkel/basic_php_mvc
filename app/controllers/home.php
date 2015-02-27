<?php
/**
 * Created by PhpStorm.
 * User: justinvoelkel
 * Date: 1/11/15
 * Time: 8:31 PM
 */

class Home extends Controller
{
    public function index($param='')
    {
        $user = $this->model('User');
        $user->name = $param;

        $this->view('home/index',['name'=>$user->name]);
    }

    public function create($username = '',$password='')
    {
        User::create([
            'username'=>$username,
            'password'=>$password
        ]);
    }
}