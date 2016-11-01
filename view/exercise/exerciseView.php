<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:42
 */
require_once ("../View.php");
class ExerciseView extends View {
    var $data;
    var $statistics;

    function displayData($data){
        $this->data = $data;
    }

    function displayStatistics($statistics){
        $this->statistics = $statistics;
    }
}