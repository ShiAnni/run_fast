<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 21:13
 */
require_once (dirname(__FILE__)."/../Model.php");
class FriendModel extends Model {
    function __construct() {
        parent::__construct();
    }

    function friendList($userId){
        $result = $this->dataAccess->executeSelect("SELECT id,username,face,description FROM user,friend WHERE id=userBId AND userAId=".$userId);
        $xml = new DOMDocument();
        $xml->loadXML("<friends></friends>");
        while ($row = $result->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/user.xml");
            $element->getElementsByTagName("userId")[0]->appendChild($element->createTextNode($row["id"]));
            $element->getElementsByTagName("face")[0]->appendChild($element->createTextNode($row["face"]));
            $element->getElementsByTagName("username")[0]->appendChild($element->createTextNode($row["username"]));
            $element->getElementsByTagName("description")[0]->appendChild($element->createTextNode($row["description"]));
            $xml->getElementsByTagName("friends")[0]->appendChild($xml->importNode($element->getElementsByTagName("user")[0],true));
        }
        return simplexml_import_dom($xml);
    }

    function getApplyList($userId){
        $result = $this->dataAccess->executeSelect("SELECT id,username,face,description FROM user,apply WHERE id=applier AND applied=".$userId);
        $xml = new DOMDocument();
        $xml->loadXML("<friends></friends>");
        while ($row = $result->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/user.xml");
            $element->getElementsByTagName("userId")[0]->appendChild($element->createTextNode($row["id"]));
            $element->getElementsByTagName("face")[0]->appendChild($element->createTextNode($row["face"]));
            $element->getElementsByTagName("username")[0]->appendChild($element->createTextNode($row["username"]));
            $element->getElementsByTagName("description")[0]->appendChild($element->createTextNode($row["description"]));
            $xml->getElementsByTagName("friends")[0]->appendChild($xml->importNode($element->getElementsByTagName("user")[0],true));
        }
        return simplexml_import_dom($xml);
    }

    function addFriend($userId, $applyId){
        $result = $this->dataAccess->executeInUpDe("INSERT INTO friend VALUES (".$userId.",".$applyId.");");
        $this->dataAccess->executeInUpDe("INSERT INTO friend VALUES (".$applyId.",".$userId.");");
        $re = $this->dataAccess->executeSelect("SELECT * FROM focus WHERE focusId=".$userId." AND focusedId=".$applyId)->fetchArray();
        if (!$re){
            $this->dataAccess->executeInUpDe("INSERT INTO focus VALUES (".$userId.",".$applyId.");");
        }
        $re = $this->dataAccess->executeSelect("SELECT * FROM focus WHERE focusId=".$applyId." AND focusedId=".$userId)->fetchArray();
        if (!$re){
            $this->dataAccess->executeInUpDe("INSERT INTO focus VALUES (".$applyId.",".$userId.");");
        }
        return (int)$result;
    }

    function removeApply($userId, $applyId){
        $result = $this->dataAccess->executeInUpDe("DELETE FROM apply WHERE applier=".$applyId." AND applied=".$userId.";");
        return (int)$result;
    }

    function deleteFriend($userId, $friendId){
        $result = $this->dataAccess->executeInUpDe("DELETE FROM friend WHERE (userAId=".$userId." AND userBId=".$friendId.") 
        OR (userAId=".$friendId." AND userBId=".$userId.");");
        if ($result){
            $result = $this->dataAccess->executeInUpDe("DELETE FROM focus WHERE (focusId=".$userId." AND focusedId=".$friendId.") 
        OR (focusId=".$friendId." AND focusedId=".$userId.");");
            return (int)$result;
        } else {
            return 0;
        }
    }
    function sendApply($userId,$applyId){
        return (int)$this->dataAccess->executeInUpDe("INSERT INTO apply VALUES (".$userId.",".$applyId.");");
    }
}