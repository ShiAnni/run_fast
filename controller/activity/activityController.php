<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:53
 */
class ActivityController extends Controller {
    function __construct($view) {
        require("../../model/activity/activityModel.php");
        $this->model = new ActivityModel($view);
    }

    function checkActivity($activityId){

    }

    function publishActivity($activity){

    }

    function activityList() {

    }

    function editActivity($activityId, $activity){

    }
}