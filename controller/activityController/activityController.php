<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:53
 */
class ActivityController extends Controller {
    function __construct($view) {
        require("../../model/activityModel/activityModel.php");
        $this->model = new ActivityModel($view);
    }

    function checkActivity($activityId){
        $this->model->checkActivity($activityId);
    }

    function publishActivity($activity){
        $this->model->addActivity($activity);
    }

    function activityList() {
        $this->model->activityList();
    }

    function editActivity($activityId, $activity){
        $this->model->editActivity($activityId,$activity);
    }

    function joinActivity($activityId, $userId){
        $this->model->joinActivity($activityId,$userId);
    }
}