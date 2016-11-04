<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 0:14
 */
class authorityModel extends Model {
    function __construct($view) {
        parent::__construct($view);
    }

    function getBannedList($keyword) {

    }

    function getUserList($keyword){

    }

    function ban($userId, $length){

    }

    function release($userId){

    }

    function setIsManager($userId, $isManager){

    }
}