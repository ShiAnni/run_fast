<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 10:38
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/personalModel/dynamicsModel.php");
class DynamicsController extends Controller {
    function __construct(){
        $this->model = new DynamicsModel();
    }

    function getDynamics($userId) {
       return $this->model->getDynamics($userId);
    }

    function sendDynamic($dynamic){
       return $this->model->sendDynamic($dynamic);
    }
}