<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 20:51
 */
class FriendController extends Controller {
    function __construct(){
        $this->model = new FriendModel();
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
}