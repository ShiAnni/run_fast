<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/12/3
 * Time: 13:55
 */
session_start();
require_once (dirname(__FILE__)."/../../controller/exerciseController/exerciseController.php");
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$controller = new ExerciseController();
if (count($arr) > 4){
    switch ($arr[4]) {
        case "statistics":
            $result = $controller->getStatistics($_SESSION["id"], $_POST["type"],$_POST["startDate"],$_POST["endDate"],$_POST["statisticType"]);
            $jsonArr = array("chart"=>array("type"=>(string)$result->type[0]),"title"=>array("text"=>(string)$result->title[0]),
                "yAxis"=>array("min"=>0, "title"=>array("text"=>(string)$result->unit[0])),"plotOptions"=>array("column"=>array("pointPadding"=>0.2, "borderWidth"=>0)),
                "tooltip"=>array("headerFormat"=>"<span style=\"font-size:10px\">{point.key}</span><table>",
                    "pointFormat"=>"<tr><td style=\"color:{series.color};padding:0\">{series.name}: </td><td style=\"padding:0\"><b>{point.y:.1f} "
                        .(string)$result->unit[0]."</b></td></tr>","footerFormat"=>"</table>"),"xAxis"=>array("crosshair"=>true,"categories"=>array()),
                "series"=>array(array("name"=>(string)$result->title[0],"data"=>array())));
            foreach ($result->dataList[0]->children() as $child){
                array_splice($jsonArr["xAxis"]["categories"], count($jsonArr["xAxis"]["categories"]),0,(string)$child->time[0]);
                array_splice($jsonArr["series"][0]["data"], count($jsonArr["series"][0]["data"]),0,(string)$child->num[0]);
            }
            echo (string)json_encode($jsonArr, JSON_NUMERIC_CHECK);
            break;
        case "record":
            $num = $_POST["num"];
            if ($num == 1){
                $xml = new DOMDocument();
                $xml->load(dirname(__FILE__)."/../../data/exercise.xml");
                $xml->getElementsByTagName("type")[0]->appendChild($xml->createTextNode($_POST["type"]));
                $xml->getElementsByTagName("userId")[0]->appendChild($xml->createTextNode($_SESSION["id"]));
                $xml->getElementsByTagName("data")[0]->appendChild($xml->createTextNode($_POST["data"]));
                date_default_timezone_set("PRC");
                $xml->getElementsByTagName("date")[0]->appendChild($xml->createTextNode(date("Y-m-d")));
                echo (int)$controller->record(simplexml_import_dom($xml));
            } else if($num == 2){
                $xml = new DOMDocument();
                $xml->load(dirname(__FILE__)."/../../data/exercise.xml");
                $xml->getElementsByTagName("type")[0]->appendChild($xml->createTextNode($_POST["type"][0]));
                $xml->getElementsByTagName("userId")[0]->appendChild($xml->createTextNode($_SESSION["id"]));
                $xml->getElementsByTagName("data")[0]->appendChild($xml->createTextNode($_POST["data"][0]));
                date_default_timezone_set("PRC");
                $xml->getElementsByTagName("date")[0]->appendChild($xml->createTextNode(date("Y-m-d")));
                $result = $controller->record(simplexml_import_dom($xml));
                if ($result){
                    $xml = new DOMDocument();
                    $xml->load(dirname(__FILE__)."/../../data/exercise.xml");
                    $xml->getElementsByTagName("type")[0]->appendChild($xml->createTextNode($_POST["type"][1]));
                    $xml->getElementsByTagName("userId")[0]->appendChild($xml->createTextNode($_SESSION["id"]));
                    $xml->getElementsByTagName("data")[0]->appendChild($xml->createTextNode($_POST["data"][1]));
                    date_default_timezone_set("PRC");
                    $xml->getElementsByTagName("date")[0]->appendChild($xml->createTextNode(date("Y-m-d")));
                    echo (int)$controller->record(simplexml_import_dom($xml));
                }
            }
            break;
    }
}