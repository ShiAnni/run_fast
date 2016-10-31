<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:56
 */
class PersonalController extends Controller {
    function __construct(){
        $this->model = new PersonalModel();
    }

    function getPersonalInfo($userId){

    }

    function getFocusFansFriendsNum($userId){

    }

    function getMessageInfo($userId){

    }

    function getDynamics($userId) {

    }

    function sendDynamic($userId, $dynamic){

    }

    function getFocusList($userId) {

    }

    function getFansList($userId) {

    }

    function focusUser($userId, $focusId){

    }

    function removeFocus($userId, $focusId) {

    }
}