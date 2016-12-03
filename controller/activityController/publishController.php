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
        $result = $this->model->addActivity($activity);
        if ($result){
            require_once (dirname(__FILE__)."/../../model/personalModel/personalModel.php");
            $personalModel = new PersonalModel();
            return $personalModel->updateExperience($_SESSION["id"], 100);
        } else {
            return false;
        }
    }
}
