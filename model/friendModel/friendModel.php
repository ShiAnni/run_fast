<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 21:13
 */
require_once (dirname(__FILE__)."/../Model.php");
class FriendModel extends Model {
    function __construct() {
        parent::__construct();
    }

    function friendList($userId, $keyword){

    }

    function getApplyList($userId){

    }

    function addFriend($userId, $applyId){

    }

    function removeApply($userId, $applyId){

    }

    function deleteFriend($userId, $friendId){

    }
}