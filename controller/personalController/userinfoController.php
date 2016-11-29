<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 20:52
 */
require ("../../model/personalModel/userinfoModel.php");
require ("../../model/friendModel/friendModel.php");
require ("personalController.php");
class UserInfoController extends Controller {
    private $personalController;
    private $friendModel;
    function __construct($view){
        $this->model = new UserInfoModel($view);
        $this->friendModel = new FriendModel($view);
    }

    function initialize($userId){
        $this->personalController->getPersonalInfo($userId);
    }

    function getInfoRight($userId){
        $this->model->getInfoRight($userId);
    }

    function addFriend($selfId, $userId){
        $this->model->addFriend($selfId,$userId);
    }

    function cancelFriend($selfId, $userId){
        $this->friendModel->deleteFriend($selfId,$userId);
    }
}