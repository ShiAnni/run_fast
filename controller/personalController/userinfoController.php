<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 20:52
 */
class UserInfoController extends Controller {
    function __construct($view){
        $this->model = new UserInfoController($view);
    }

    function addFriend($selfId, $userId){

    }

    function cancelFriend($selfId, $userId){

    }
}