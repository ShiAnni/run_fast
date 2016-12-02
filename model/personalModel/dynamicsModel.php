<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 10:40
 */
require_once (dirname(__FILE__)."/../Model.php");
class DynamicsModel extends Model {
    function __construct(){
        parent::__construct();
    }

    function getDynamics($userId) {
        $result = $this->dataAccess->executeSelect("SELECT DISTINCT id, username,face,time,content FROM user,dynamic,focus WHERE 
        (id=userId AND id=".$userId.") OR (id=focusedId AND focusedId=userId AND focusId=".$userId.") ORDER BY time DESC;");
        if ($result == false){
            return false;
        } else {
            $xml = new DOMDocument();
            $xml->load(dirname(__FILE__)."/../../data/dynamics.xml");
            while($row = $result->fetchArray()){
                $element = $xml->createElement("dynamic","");
                $element->appendChild($xml->createElement("userId",$row["id"]));
                $element->appendChild($xml->createElement("username",$row["username"]));
                $element->appendChild($xml->createElement("face",$row["face"]));
                $element->appendChild($xml->createElement("time",$row["time"]));
                $element->appendChild($xml->createElement("content",$row["content"]));
                $xml->getElementsByTagName("dynamics")[0]->appendChild($element);
            }
            return simplexml_import_dom($xml);
        }
    }

    function sendDynamic($dynamic){
//        return "INSERT INTO dynamic VALUES (".$dynamic->userId[0].",'".$dynamic->time[0]."','".
//            $dynamic->content[0]."');";
        $result = $this->dataAccess->executeInUpDe("INSERT INTO dynamic VALUES (".$dynamic->userId[0].",'".$dynamic->time[0]."','".
            $dynamic->content[0]."');");
        return $result;
    }
}