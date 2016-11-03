<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 9:46
 */
class FocusController extends Controller {
    function __construct($view){
        require_once ("../../model/personal/focusModel.php");
        $this->model = new FocusModel();
    }

    function getFocusList($userId){

    }
}