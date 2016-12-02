<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 10:32
 */
require_once (dirname(__FILE__)."/../Model.php");
class FocusModel extends Model {
    function __construct(){
        parent::__construct();
    }

    function getFocusList($userId) {
        $result = $this->dataAccess->executeSelect("SELECT DISTINCT id,username,face,description FROM user,focus WHERE id=focusedId AND focusId=".$userId.";");
        $xml = new DOMDocument();
        $xml->loadXML("<fans></fans>");
        while ($row = $result->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/user.xml");
            $element->getElementsByTagName("userId")[0]->appendChild($element->createTextNode($row["id"]));
            $element->getElementsByTagName("face")[0]->appendChild($element->createTextNode($row["face"]));
            $element->getElementsByTagName("username")[0]->appendChild($element->createTextNode($row["username"]));
            $element->getElementsByTagName("description")[0]->appendChild($element->createTextNode($row["description"]));
            $element->getElementsByTagName("focused")[0]->appendChild($element->createTextNode(1));
            $friend = $this->dataAccess->executeSelect("SELECT * FROM friend WHERE userAId=".$userId." AND userBId=".$row["id"].";");
            if ($friend->fetchArray()){
                $element->getElementsByTagName("isFriend")[0]->appendChild($element->createTextNode("1"));
            } else {
                $element->getElementsByTagName("isFriend")[0]->appendChild($element->createTextNode("0"));
            }
            $xml->getElementsByTagName("fans")[0]->appendChild($xml->importNode($element->getElementsByTagName("user")[0],true));
        }
        $row = $this->dataAccess->executeSelect("SELECT DISTINCT id,username FROM user WHERE id=".$userId.";")->fetchArray();
        $xml->getElementsByTagName("fans")[0]->setAttribute("id",$row["id"]);
        $xml->getElementsByTagName("fans")[0]->setAttribute("name",$row["username"]);
        return simplexml_import_dom($xml);
    }

    function removeFocus($userId, $focusId) {
        $result = $this->dataAccess->executeInUpDe("DELETE FROM focus WHERE focusId=".$userId." AND focusedId=".$focusId);
        return (string)$result;
    }
}