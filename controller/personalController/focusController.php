<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 9:46
 */
require_once (dirname(__FILE__)."/../../model/personalModel/focusModel.php");
require_once (dirname(__FILE__)."/../Controller.php");
class FocusController extends Controller {
    function __construct(){
        $this->model = new FocusModel();
    }

    function getFocusList($userId){
        return $this->model->getFocusList($userId);
    }

    function removeFocus($userId, $focusId) {
        return $this->model->removeFocus($userId,$focusId);
    }
}