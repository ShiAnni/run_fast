<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/30
 * Time: 10:27
 */
class ActivityFactory {
    static function createActivity($row){
        $xml = new DOMDocument();
        $xml->load(dirname(__FILE__)."/../../data/activity.xml");
        $xml->getElementById("id")->nodeValue = $row['id'];
        $xml->getElementById("name")->nodeValue = $row['name'];
        $xml->getElementById("description")->nodeValue = $row['description'];
        $xml->getElementById("publisherId")->nodeValue = $row['publisherId'];
        $xml->getElementById("publisher")->nodeValue = $row['publisher'];
        $xml->getElementById("participate")->nodeValue = $row['participate'];
        $xml->getElementById("upper")->nodeValue = $row['upper'];
        $xml->getElementById("startDate")->nodeValue = $row['startDate'];
        $xml->getElementById("endDate")->nodeValue = $row['endDate'];
        $xml->getElementById("location")->nodeValue = $row['location'];
        $xml->getElementById("limit")->nodeValue = $row['levelLimit']."级";
        return $xml;
    }
}