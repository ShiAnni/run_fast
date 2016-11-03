<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 20:51
 */
class FriendController extends Controller {
    function __construct($view){
        $this->model = new FriendModel($view);
    }

    function friendList($userId, $keyword){

    }

    function getApplyList($userId){

    }

    function acceptApply($userId, $applyId){

    }

    function rejectApply($userId, $applyId){

    }

    function deleteFriend($userId, $friendId){

    }

    function sendMessage($message){

    }
}