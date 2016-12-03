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
        $result = $this->model->record($data);
        if ($result){
            require_once (dirname(__FILE__)."/../../model/personalModel/personalModel.php");
            $personalModel = new PersonalModel();
            return $personalModel->updateExperience($_SESSION["id"],20);
        } else {
            return 0;
        }
    }

    function getTodayData($userId) {
        return $this->model->getTodayData($userId);
    }

    function getStatistics($userId, $dataType, $startTime, $endTime, $statisticType=""){
        switch ($statisticType){
            case "":
                return $this->model->getStatistics($userId,$dataType,$startTime,$endTime);
        }
    }
}