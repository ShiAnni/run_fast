<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/12/2
 * Time: 14:38
 */
session_start();
require_once (dirname(__FILE__)."/../../controller/personalController/dynamicsController.php");
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
if (count($arr) > 4){
    switch ($arr[4]) {
        case "refresh":
            $controller = new DynamicsController();
            $result = $controller->getDynamics($_SESSION["id"]);
            $xmlStr = "";
            foreach ($result->children() as $item){
                $itemHtml = new DOMDocument();
                $itemHtml->loadHTMLFile(dirname(__FILE__)."/dynamic-info.html");
                $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/personal.php/personal/".$item->userId[0]);
                $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$item->face[0]);
                $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$item->username[0]);
                $itemHtml->getElementsByTagName("div")[3]->appendChild($itemHtml->createTextNode($item->username[0]));
                $itemHtml->getElementsByTagName("div")[4]->appendChild($itemHtml->createTextNode($item->time[0]));
                $itemHtml->getElementsByTagName("div")[5]->appendChild($itemHtml->createTextNode($item->content[0]));
                $xmlStr.= $itemHtml->saveHTML();
            }
            echo $xmlStr;
            break;
        case "send":
            $controller = new DynamicsController();
            $xml = new DOMDocument();
            $xml->load(dirname(__FILE__)."/../../data/dynamic.xml");
            $xml->getElementsByTagName("userId")[0]->appendChild($xml->createTextNode($_SESSION["id"]));
            date_default_timezone_set('PRC');
            $xml->getElementsByTagName("time")[0]->appendChild($xml->createTextNode(date("Y-m-d H:i")));
            $xml->getElementsByTagName("content")[0]->appendChild($xml->createTextNode($_POST["content"]));
            echo (string)$controller->sendDynamic(simplexml_import_dom($xml));
            break;
        case "un-focus":
            break;
    }
}