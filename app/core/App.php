<?php
/**
 * Created by PhpStorm.
 * User: justinvoelkel
 * Date: 1/11/15
 * Time: 8:16 PM
 */

class App
{
    //default controller and method
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        /*
         * Check the parsed url for controller's existance
         */
        if(file_exists('../app/controllers/' . $url[0] . '.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }
        //require the default or overridden controller
        require_once '../app/controllers/' . $this->controller . '.php';
        //init new instance of controller
        $this->controller = new $this->controller;

        /*
         * Check if a method is set in the url
         */
        if(isset($url[1]))
        {
            //if it is set make sure that the method in the url actually exists
            if(method_exists($this->controller,$url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //set params from what is left of the url - the reason for un-setting above
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    public function parseUrl()
    {
        //explode and trim the url - controller/method/params

        if(isset($_GET['url'])) //htacces will rewrite the url
        {
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }
    }
}