<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:56
 */
require_once (dirname(__FILE__)."/../Controller.php");
require_once (dirname(__FILE__)."/../../model/personalModel/personalModel.php");
class PersonalController extends Controller {
    function __construct(){
        $this->model = new PersonalModel();
    }
    function getPersonalInfo($userId){
        return $this->model->getPersonalInfo($userId);
    }

    function getInfoRight($userId){
        return $this->model->getInfoRight($userId);
    }

    function editPersonalInfo($userId, $personalInfo){
        return $this->model->editPersonalInfo($userId,$personalInfo);
    }
}