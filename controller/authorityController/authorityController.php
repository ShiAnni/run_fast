<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:54
 */
class AuthorityController extends Controller {
    function __construct($view) {
        $this->model = new AuthorityModel($view);
    }

    function getBannedList($keyword) {
        $this->model->getBannedList($keyword);
    }

    function getUserList($keyword){
        $this->model->getUserList($keyword);
    }

    function ban($userId, $length){
        $this->model->ban($userId,$length);
    }

    function release($userId){
        $this->model->release($userId);
    }

    function setManager($userId){
        $this->model->setIsManager($userId,true);
    }

    function releaseManager($userId){
        $this->model->release($userId,false);
    }
}