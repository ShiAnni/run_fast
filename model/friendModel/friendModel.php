<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 21:13
 */
class FriendModel extends Model {
    function __construct($view) {
        parent::__construct($view);
    }

    function friendList($userId, $keyword){

    }

    function getApplyList($userId){

    }

    function addFriend($userId, $applyId){

    }

    function addFocus($selfId, $userId) {

    }

    function removeApply($userId, $applyId){

    }

    function deleteFriend($userId, $friendId){

    }

    function removeFocus($selfId, $userId) {

    }
}