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

    }

    function getPersonalInfo($userId){

    }

    function getInfoRight($userId){

    }

    function getMessageInfo($userId){

    }

    function editPersonalInfo($userId, $personalInfo){

    }

    function sendMessage($message){

    }
}