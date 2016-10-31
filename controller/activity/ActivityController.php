<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:53
 */
class ActivityController extends Controller {
    function __construct() {
        require("../../model/activity/ActivityModel.php");
        $this->model = new ActivityModel();
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