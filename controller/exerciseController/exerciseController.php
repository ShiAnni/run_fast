<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:55
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/exerciseModel/exerciseModel.php");
class ExerciseController extends Controller {
    function __construct() {
        $this->model = new ExerciseModel();
    }

    function record($data){
        return $this->model->record($data);
    }

    function getTodayData($userId) {
        return $this->model->getTodayData($userId);
    }

    function getStatistics($userId, $dataType, $statisticType, $startTime, $endTime){
        return $this->model->getStatistics($userId,$dataType,$statisticType,$startTime,$endTime);
    }
}