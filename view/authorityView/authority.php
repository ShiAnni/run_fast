<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/12/3
 * Time: 0:48
 */
session_start();
require_once (dirname(__FILE__)."/../../controller/authorityController/authorityController.php");
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$controller = new AuthorityController();
if (count($arr) > 4){
    switch ($arr[4]) {
        case "search":
            $result = $controller->getUserList($_POST["keyword"]);
            $xmlStr = "";
            foreach ($result->children() as $item){
                $itemHtml = new DOMDocument();
                $itemHtml->loadHTMLFile(dirname(__FILE__)."/authority-info.html");
                $itemHtml->getElementsByTagName("div")[1]->appendChild($itemHtml->createTextNode($item->username[0]));
                $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$item->face[0]);
                $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$item->username[0]);
                if ($item->isManager == "1"){
                    $itemHtml->getElementsByTagName("a")[0]->appendChild($itemHtml->createTextNode("解除管理员"));
                    if ($item->userId[0] == $_SESSION["id"]){
                        $itemHtml->getElementsByTagName("a")[0]->setAttribute("class","user-btn custom-btn plane-colored-btn btn-disabled");
                    } else {
                        $itemHtml->getElementsByTagName("a")[0]->setAttribute("class","user-btn custom-btn plane-colored-btn release-manager");
                    }
                } else {
                    $itemHtml->getElementsByTagName("a")[0]->appendChild($itemHtml->createTextNode("设为管理员"));
                    $itemHtml->getElementsByTagName("a")[0]->setAttribute("class","user-btn custom-btn plane-colored-btn set-manager");
                }
                $itemHtml->getElementsByTagName("a")[0]->setAttribute("id",$item->userId[0]);
                $xmlStr.= $itemHtml->saveHTML();
            }
            echo $xmlStr;
            break;
        case "set-manager":
            echo $controller->setManager($_POST["id"]);
            break;
        case "release-manager":
            echo $controller->releaseManager($_POST["id"]);
            break;
    }
}