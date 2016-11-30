<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 11:05
 */
require_once (dirname(__FILE__)."/../dataAccess/dataAccess.php");
class Model {
    protected $dataAccess;
    function __construct(){
        $this->dataAccess = DataAccess::getDataAccess();
    }
}