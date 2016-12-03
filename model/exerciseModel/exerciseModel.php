<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 0:14
 */
require_once (dirname(__FILE__)."/../Model.php");
class ExerciseModel extends Model {
    function __construct() {
        parent::__construct();
    }

    function record($data){

    }

    function getTodayData($userId) {
        date_default_timezone_set('PRC');
        $result = $this->dataAccess->executeSelect("SELECT * FROM exercise WHERE userId=".$userId." AND date='".date("Y-m-d")."'");
        $height = $this->dataAccess->executeSelect("SELECT * FROM exercise WHERE userId=".$userId." AND type='height' 
        ORDER BY date DESC LIMIT 1");
        $weight = $this->dataAccess->executeSelect("SELECT * FROM exercise WHERE userId=".$userId." AND type='weight' 
        ORDER BY date DESC LIMIT 1");
        $xml = new DOMDocument();
        $xml->load(dirname(__FILE__)."/../../data/exerciseToday.xml");
        while ($row = $result->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/exerciseItem.xml");
            $element->getElementsByTagName("type")[0]->appendChild($element->createTextNode($row["type"]));
            $element->getElementsByTagName("num")[0]->appendChild($element->createTextNode($row["data"]));
            $xml->getElementsByTagName("exercise")[0]->appendChild($xml->importNode($element->getElementsByTagName("data")[0],true));
        }
        if($row = $height->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/exerciseItem.xml");
            $element->getElementsByTagName("type")[0]->appendChild($element->createTextNode($row["type"]));
            $element->getElementsByTagName("num")[0]->appendChild($element->createTextNode($row["data"]));
            $xml->getElementsByTagName("exercise")[0]->appendChild($xml->importNode($element->getElementsByTagName("data")[0],true));
        }
        if($row = $weight->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/exerciseItem.xml");
            $element->getElementsByTagName("type")[0]->appendChild($element->createTextNode($row["type"]));
            $element->getElementsByTagName("num")[0]->appendChild($element->createTextNode($row["data"]));
            $xml->getElementsByTagName("exercise")[0]->appendChild($xml->importNode($element->getElementsByTagName("data")[0],true));
        }
        $xml->getElementsByTagName("userId")[0]->appendChild($xml->createTextNode($userId));
        return simplexml_import_dom($xml);
    }

    function getStatistics($userId, $dataType, $statisticType, $startTime, $endTime){

    }
}