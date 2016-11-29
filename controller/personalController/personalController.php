<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:56
 */
class PersonalController extends Controller {
    function __construct($view){
        $this->model = new PersonalModel($view);
    }

    function initialize($userId){
        $this->getPersonalInfo($userId);
        $this->getInfoRight($userId);
        $this->getMessageInfo($userId);
    }

    function getPersonalInfo($userId){
        $this->model->getPersonalInfo($userId);
    }

    function getInfoRight($userId){
        $this->model->getInfoRight($userId);
    }

    function getMessageInfo($userId){
        $this->model->getMessageInfo($userId);
    }

    function editPersonalInfo($userId, $personalInfo){
        $this->model->editPersonalInfo($userId,$personalInfo);
    }

    function sendMessage($message){
        require ("../../model/messageModel/messageModel.php");
        $messageModel = new MessageModel();
        $messageModel->sendMessage($message);
    }
}