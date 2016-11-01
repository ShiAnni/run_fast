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

    function setUserBanned($userId, $isBanned){

    }

    function setIsManager($userId, $isManager){

    }
}