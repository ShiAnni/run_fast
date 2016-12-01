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
        $xml->getElementsByTagName("id")[0]->nodeValue = $row['id'];
        $xml->getElementsByTagName("name")[0]->nodeValue = $row['name'];
        $xml->getElementsByTagName("description")[0]->nodeValue = $row['description'];
        $xml->getElementsByTagName("publisherId")[0]->nodeValue = $row['publisherId'];
        $xml->getElementsByTagName("publisher")[0]->nodeValue = $row['publisher'];
        $xml->getElementsByTagName("participate")[0]->nodeValue = $row['participate'];
        $xml->getElementsByTagName("upper")[0]->nodeValue = $row['upper'];
        $xml->getElementsByTagName("startDate")[0]->nodeValue = $row['startDate'];
        $xml->getElementsByTagName("endDate")[0]->nodeValue = $row['endDate'];
        $xml->getElementsByTagName("location")[0]->nodeValue = $row['location'];
        $xml->getElementsByTagName("limit")[0]->nodeValue = $row['levelLimit']."级";
        return $xml;
    }
}