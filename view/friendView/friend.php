<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/12/2
 * Time: 22:19
 */
session_start();
require_once (dirname(__FILE__)."/../../controller/friendController/friendController.php");
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
if (count($arr) > 4){
    switch ($arr[4]) {
        case "delete":
            $controller = new FriendController();
            $result = $controller->deleteFriend($_SESSION["id"],$_POST["id"]);
            echo $result;
            break;
        case "accept":
            $controller = new FriendController();
            $result = $controller->acceptApply($_SESSION["id"],$_POST["id"]);
            echo $result;
            break;
        case "reject":
            $controller = new FriendController();
            $result = $controller->rejectApply($_SESSION["id"],$_POST["id"]);
            echo $result;
            break;
        case "apply":
            $controller = new FriendController();
            $result = $controller->sendApply($_SESSION["id"],$_POST["id"]);
            echo $result;
            break;
    }
}