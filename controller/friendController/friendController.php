<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 20:51
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/friendModel/friendModel.php");
class FriendController extends Controller {
    function __construct(){
        $this->model = new FriendModel();
    }

    function friendList($userId){
        return $this->model->friendList($userId);
    }

    function getApplyList($userId){
        return $this->model->getApplyList($userId);
    }

    function acceptApply($userId, $applyId){
        $success = $this->model->addFriend($userId,$applyId);
        if ($success){
            return $this->model->removeApply($userId,$applyId);
        } else {
            return false;
        }
    }

    function rejectApply($userId, $applyId){
        return $this->model->removeApply($userId,$applyId);
    }

    function deleteFriend($userId, $friendId){
        return $this->model->deleteFriend($userId, $friendId);
    }

    function sendApply($userId,$applyId){
        return $this->model->sendApply($userId, $applyId);
    }
}