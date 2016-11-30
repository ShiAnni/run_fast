<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/30
 * Time: 23:05
 */
class PublishController extends Controller {
    function __construct() {
        require("../../model/activityModel/activityModel.php");
        $this->model = new ActivityModel();
    }

    function publish($activity){
        $this->model->addActivity($activity);
    }
}
