<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 10:38
 */
class DynamicsController extends Controller {
    function __construct($view){
        require_once ("../../model/personal/dynamicsModel.php");
        $this->model = new DynamicsModel();
    }

    function getDynamics($userId) {

    }

    function sendDynamic($dynamic){

    }
}