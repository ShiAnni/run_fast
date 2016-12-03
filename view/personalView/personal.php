<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/12/2
 * Time: 14:38
 */
session_start();
require_once (dirname(__FILE__)."/../../controller/personalController/personalController.php");
require_once (dirname(__FILE__)."/../../controller/personalController/dynamicsController.php");
require_once (dirname(__FILE__)."/../../controller/personalController/focusController.php");
require_once (dirname(__FILE__)."/../../controller/personalController/fansController.php");
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
            $controller = new FocusController();
            echo $controller->removeFocus($_SESSION["id"],$_POST["id"]);
            break;
        case "focus":
            $controller = new FansController();
            echo $controller->focusUser($_SESSION["id"],$_POST["id"]);
            break;
        case "edit":
            $controller = new PersonalController();
            $xml = new DOMDocument();
            $xml->load(dirname(__FILE__)."/../../data/personalEdit.xml");
            $xml->getElementsByTagName("description")[0]->appendChild($xml->createTextNode($_POST["description"]));
            $xml->getElementsByTagName("gender")[0]->appendChild($xml->createTextNode($_POST["gender"]));
            $xml->getElementsByTagName("location")[0]->appendChild($xml->createTextNode($_POST["location"]));
            $xml->getElementsByTagName("birthday")[0]->appendChild($xml->createTextNode($_POST["birthday"]));
            echo $controller->editPersonalInfo($_SESSION["id"],simplexml_import_dom($xml));
            break;
    }
}