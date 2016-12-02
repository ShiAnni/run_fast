<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 0:14
 */
require_once (dirname(__FILE__)."/../Model.php");
class IndexModel extends Model {
    function __construct(){
        parent::__construct();
    }

    function initialize(){
        $xml = new DOMDocument();
        $xml->load(dirname(__FILE__)."/../../data/index.xml");
        $result = $this->getNews();
        for ($i=0;$row = $result->fetchArray(SQLITE3_ASSOC);$i++){
            $xml->getElementsByTagName("newsList")[0]->appendChild($xml->createElement("news",""));
            $xml->getElementsByTagName("news")[$i]->appendChild($xml->createElement("title",$row["title"]));
            $xml->getElementsByTagName("news")[$i]->appendChild($xml->createElement("time",$row["time"]));
        }
        $result = $this->getAnnouncements();
        for ($i=0;$row = $result->fetchArray(SQLITE3_ASSOC);$i++){
            $xml->getElementsByTagName("announcementList")[0]->appendChild($xml->createElement("announcement",""));
            $xml->getElementsByTagName("announcement")[$i]->appendChild($xml->createElement("title",$row["title"]));
            $xml->getElementsByTagName("announcement")[$i]->appendChild($xml->createElement("time",$row["time"]));
        }
        $result = $this->getActivities();
        for ($i=0;$row = $result->fetchArray(SQLITE3_ASSOC);$i++){
            $xml->getElementsByTagName("activityList")[0]->appendChild($xml->createElement("activity",""));
            $xml->getElementsByTagName("activity")[$i]->appendChild($xml->createElement("id",$row["id"]));
            $xml->getElementsByTagName("activity")[$i]->appendChild($xml->createElement("title",$row["name"]));
            $xml->getElementsByTagName("activity")[$i]->appendChild($xml->createElement("time",$row["startDate"]));
        }
        return simplexml_import_dom($xml);
    }

    function login($username, $password){
        $row = $this->dataAccess->executeSelect("SELECT * FROM user WHERE username='".$username."' AND password='".$password."';")->fetchArray();
        if ($row == false){
            return false;
        } else {
            return $this->getInfo($username);
        }
    }

    function register($username, $password){
        $result = $this->dataAccess->executeInUpDe("INSERT INTO user (username,password,face,level,experience,isManager) VALUES ('"
        .$username."','".$password."','/image/default.png',1,0,0);");
        if ($result){
            return $this->getInfo($username);
        } else {
            return false;
        }

    }

    private function getNews(){
        return $result = $this->dataAccess->executeSelect("SELECT * FROM `index` WHERE type='news' ORDER BY time DESC LIMIT 5");
    }

    private function getAnnouncements(){
        return $result = $this->dataAccess->executeSelect("SELECT * FROM `index` WHERE type='announcement' ORDER BY time DESC LIMIT 5");
    }

    private function getActivities(){
        return $result = $this->dataAccess->executeSelect("SELECT * FROM activity ORDER BY startDate DESC LIMIT 5");
    }

    private function getInfo($username){
        $row = $this->dataAccess->executeSelect("SELECT * FROM user WHERE username='".$username."';")->fetchArray();
        $xml = new DOMDocument();
        $xml->load(dirname(__FILE__)."/../../data/personal.xml");
        $xml->getElementsByTagName("userId")[0]->appendChild($xml->createTextNode($row["id"]));
        $xml->getElementsByTagName("face")[0]->appendChild($xml->createTextNode($row["face"]));
        $xml->getElementsByTagName("username")[0]->appendChild($xml->createTextNode($row["username"]));
        $xml->getElementsByTagName("isManager")[0]->appendChild($xml->createTextNode($row["isManager"]));
        return simplexml_import_dom($xml);
    }
}