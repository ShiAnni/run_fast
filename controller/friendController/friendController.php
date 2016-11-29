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
        $this->model->friendList($userId.$keyword);
    }

    function getApplyList($userId){
        $this->model->getApplyList($userId);
    }

    function acceptApply($userId, $applyId){
        $this->model->addFriend($userId,$applyId);
        $this->model->removeApply($userId,$applyId);
    }

    function rejectApply($userId, $applyId){
        $this->model->removeApply($userId,$applyId);
    }

    function deleteFriend($userId, $friendId){
        $this->model->deleteFriend($userId, $friendId);
    }

    function sendMessage($message){
        require ("../../model/messageModel/messageModel.php");
        $messageModel = new MessageModel();
        $messageModel->sendMessage($message);
    }
}