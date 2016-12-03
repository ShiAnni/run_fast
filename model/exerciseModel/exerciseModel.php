<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 0:14
 */
require_once (dirname(__FILE__)."/../Model.php");
class ExerciseModel extends Model {
    private $values;
    private $titles;
    private $units;

    function __construct() {
        parent::__construct();
        $this->values = ["walkNum","briskDis","briskVelocity","runDis","runVelocity","height","weight","water"];
        $this->titles = ["每日步数","每日健走距离","每日健走速度","每日跑步距离","每日跑步速度","身高","体重","饮水量"];
        $this->units = ["步","km","km/h","km","km/h","cm","kg","杯"];
    }

    function record($data){
        $result = $this->dataAccess->executeSelect("SELECT * FROM exercise WHERE userId=".$data->userId[0]." AND type='".$data->type[0]."' AND 
        date='".$data->date[0]."';");
        if ($result->fetchArray()){
            return $this->dataAccess->executeInUpDe("UPDATE exercise SET data=".$data->data[0]." WHERE userId=".$data->userId[0]." AND type='".$data->type[0]."' AND 
        date='".$data->date[0]."';");
        } else {
            return $this->dataAccess->executeInUpDe("INSERT INTO exercise VALUES(".$data->userId[0].",'".$data->type[0]."',".$data->data[0].",'".
                $data->date[0]."');");
        }
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

    function getStatistics($userId, $dataType, $startTime, $endTime){
        $result = $this->dataAccess->executeSelect("SELECT data,date FROM exercise WHERE userId=".$userId." AND (date BETWEEN '"
        .$startTime."' AND '".$endTime."') AND type='".$dataType."';");
        $xml = new DOMDocument();
        $xml->load(dirname(__FILE__)."/../../data/statistics.xml");
        $xml->getElementsByTagName("title")[0]->appendChild($xml->createTextNode($this->getTitle($dataType)));
        $xml->getElementsByTagName("unit")[0]->appendChild($xml->createTextNode($this->getUnit($dataType)));
        $xml->getElementsByTagName("type")[0]->appendChild($xml->createTextNode("column"));
        while ($row = $result->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/statistic.xml");
            $element->getElementsByTagName("time")[0]->appendChild($element->createTextNode($row["date"]));
            $element->getElementsByTagName("num")[0]->appendChild($element->createTextNode($row["data"]));
            $xml->getElementsByTagName("dataList")[0]->appendChild($xml->importNode($element->getElementsByTagName("data")[0],true));
        }
        return simplexml_import_dom($xml);
    }

    private function getTitle($type){
        $pos = array_search($type,$this->values);
        return $this->titles[$pos];
    }

    private function getUnit($type){
        $pos = array_search($type,$this->values);
        return $this->units[$pos];
    }
}