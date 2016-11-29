<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:55
 */
class ExerciseController extends Controller {
    function __construct($view) {
        $this->model = new ExerciseModel($view);
    }

    function record($data){
        $this->model->record($data);
    }

    function getTodayData($userId) {
        $this->model->getTodayData($userId);
    }

    function getStatistics($userId, $dataType, $statisticType, $startTime, $endTime){
        $this->model->getStatistics($userId,$dataType.$statisticType.$startTime,$endTime);
    }
}