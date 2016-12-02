<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:54
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/authorityModel/authorityModel.php");
class AuthorityController extends Controller {
    function __construct() {
        $this->model = new AuthorityModel();
    }

    function getUserList($keyword){
        $this->model->getUserList($keyword);
    }

    function setManager($userId){
        $this->model->setIsManager($userId,true);
    }

    function releaseManager($userId){
        $this->model->release($userId,false);
    }
}