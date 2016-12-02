<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:55
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/indexModel/indexModel.php");
class IndexController extends Controller {
    function __construct(){
        $this->model = new IndexModel();
    }

    function initialize(){
        return $this->model->initialize();
    }

    function login($username, $password) {
        return $this->model->login($username,$password);
    }

    function register($username, $password){
        return $this->model->register($username,$password);
    }
}