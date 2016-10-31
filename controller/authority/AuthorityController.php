<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:54
 */
class AuthorityController extends Controller {
    function __construct() {
        $this->model = new AuthorityModel();
    }

    function getBannedList($keyword) {

    }

    function getUserList($keyword){

    }

    function ban($userId, $length){

    }

    function release($userId){

    }

    function setManager($userId){

    }

    function releaseManager($userId){
        
    }
}