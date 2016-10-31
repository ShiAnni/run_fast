<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:55
 */
class ExerciseController extends Controller {
    function __construct() {
        $this->model = new ExerciseModel();
    }

    function record($userId, $dataType){

    }

    function getTodayData($userId, $dataType) {

    }

    function getStatistics($userId, $dataType, $statisticType, $startTime, $endTime){

    }
}