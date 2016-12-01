<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:53
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/activityModel/activityModel.php");
class ActivityController extends Controller {
    function __construct() {
        $this->model = new ActivityModel();
    }

    function check($activityId=null){
        if (is_null($activityId)){
            return $this->model->activityList();
        } else {
            return $this->model->checkActivity($activityId);
        }
    }

    function edit($activityId, $activity){
        return $this->model->editActivity($activityId,$activity);
    }

    function delete($activityId){
        return $this->model->deleteActivity($activityId);
    }

    function join($activityId, $userId){
        return $this->model->joinActivity($activityId,$userId);
    }
}