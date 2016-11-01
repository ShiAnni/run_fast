<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:55
 */
class IndexController extends Controller {
    function __construct($view){
        $this->model = new IndexModel($view);
    }

    function initialize(){

    }

    function login($username, $password) {

    }

    function register($username, $password){

    }
}