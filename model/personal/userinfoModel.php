<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 20:54
 */
class UserInfoModel extends Model {
    function __construct($view){
        parent::__construct($view);
    }

    function getUserInfo($userId){

    }

    function addFocus($selfId, $userId){

    }

    function removeFocus($selfId, $userId){

    }

    function sendMessage($senderId, $receiverId, $content){

    }

    function addFriend($selfId, $userId){

    }

    function cancelFriend($selfId, $userId){

    }
}