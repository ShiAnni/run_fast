<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/30
 * Time: 23:05
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/activityModel/activityModel.php");
class PublishController extends Controller {
    function __construct() {
        $this->model = new ActivityModel();
    }

    function publish($activity){
        $this->model->addActivity($activity);
    }
}
