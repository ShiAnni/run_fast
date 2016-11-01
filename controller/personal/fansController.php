<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 9:46
 */
class fansController extends Controller {
    function __construct($view){
        require_once ("../../model/personal/fansModel.php");
        $this->model = new FansModel();
    }

    function getFansList($userId) {

    }
}