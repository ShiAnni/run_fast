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
        $this->model->initialize();
    }

    function login($username, $password) {
        $this->model->login($username,$password);
    }

    function register($username, $password){
        $this->model->register($username,$password);
    }
}