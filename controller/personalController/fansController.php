<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 9:46
 */
require_once (dirname(__FILE__)."/../../model/personalModel/fansModel.php");
require_once (dirname(__FILE__)."/../Controller.php");
class FansController extends Controller {
    function __construct(){
        $this->model = new FansModel();
    }

    function getFansList($userId) {
        return $this->model->getFansList($userId);
    }

    function focusUser($userId, $focusId){
        return $this->model->focusUser($userId, $focusId);
    }
}