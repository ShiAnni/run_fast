<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 0:14
 */
require_once (dirname(__FILE__)."/../Model.php");
class PersonalModel extends Model {
    function __construct(){
        parent::__construct();
    }

    function getPersonalInfo($userId){
        $row = $this->dataAccess->executeSelect("SELECT * FROM user, level WHERE user.id=".$userId." AND user.level=level.num")->fetchArray(SQLITE3_ASSOC);
        if ($row){
            $xml = new DOMDocument();
            $xml->load(dirname(__FILE__)."/../../data/personalInfo.xml");
            $xml->getElementsByTagName("userId")[0]->nodeValue = $row['id'];
            $xml->getElementsByTagName("username")[0]->nodeValue = $row['username'];
            $xml->getElementsByTagName("face")[0]->nodeValue = $row['face'];
            $xml->getElementsByTagName("description")[0]->nodeValue = $row['description'];
            $xml->getElementsByTagName("level")[0]->nodeValue = $row['level']."级";
            $xml->getElementsByTagName("levelName")[0]->nodeValue = $row['name'];
            $xml->getElementsByTagName("experience")[0]->nodeValue = $row['experience'];
            $xml->getElementsByTagName("gender")[0]->nodeValue = $row['gender'];
            $xml->getElementsByTagName("location")[0]->nodeValue = $row['location'];
            $xml->getElementsByTagName("birthday")[0]->nodeValue = $row['birthday'];
            if ($_SESSION["id"] != $userId){
                $focused = $this->dataAccess->executeSelect("SELECT * FROM focus WHERE focusId=".$_SESSION["id"]." AND focusedId=".$row["id"].";");
                if ($focused->fetchArray()){
                    $xml->getElementsByTagName("focused")[0]->appendChild($xml->createTextNode("1"));
                } else {
                    $xml->getElementsByTagName("focused")[0]->appendChild($xml->createTextNode("0"));
                }
                $friend = $this->dataAccess->executeSelect("SELECT * FROM friend WHERE userAId=".$_SESSION["id"]." AND userBId=".$row["id"].";");
                if ($friend->fetchArray()){
                    $xml->getElementsByTagName("isFriend")[0]->appendChild($xml->createTextNode("2"));
                } else {
                    $friend = $this->dataAccess->executeSelect("SELECT * FROM apply WHERE applier=".$_SESSION["id"]." AND applied=".$row["id"].";");
                    if ($friend->fetchArray()){
                        $xml->getElementsByTagName("isFriend")[0]->appendChild($xml->createTextNode("1"));
                    } else {
                        $xml->getElementsByTagName("isFriend")[0]->appendChild($xml->createTextNode("0"));
                    }
                }
            }
            return simplexml_import_dom($xml);
        } else {
            return false;
        }
    }

    function getInfoRight($userId){
        $focusCount = $this->dataAccess->executeSelect("SELECT COUNT(*) AS focusNum FROM focus WHERE focusId=".$userId)->fetchArray();
        $fansCount = $this->dataAccess->executeSelect("SELECT COUNT(*) AS fansNum FROM focus WHERE focusedId=".$userId)->fetchArray();
        $friendsCount = $this->dataAccess->executeSelect("SELECT COUNT(*) AS friendNum FROM friend WHERE userAId=".$userId)->fetchArray();
        $xml = new DOMDocument();
        $xml->load(dirname(__FILE__)."/../../data/infoRight.xml");
        $xml->getElementsByTagName("userId")[0]->nodeValue = $userId;
        $xml->getElementsByTagName("focusNum")[0]->nodeValue = $focusCount['focusNum'];
        $xml->getElementsByTagName("fansNum")[0]->nodeValue = $fansCount['fansNum'];
        $xml->getElementsByTagName("friendNum")[0]->nodeValue = $friendsCount['friendNum'];
        return simplexml_import_dom($xml);
    }

    function editPersonalInfo($userId, $personalInfo){
        return (int)$this->dataAccess->executeInUpDe("UPDATE user SET description='".$personalInfo->description[0]."',gender='".$personalInfo->gender[0]."'
        ,location='".$personalInfo->location[0]."',birthday='".$personalInfo->birthday[0]."' WHERE id=".$userId);
    }

    function updateExperience($userId, $experienceIncrease){
        $row = $this->dataAccess->executeSelect("SELECT experience FROM user WHERE id=".$userId)->fetchArray();
        if ($row){
            $level = $this->getLevel((int)$row["experience"]+(int)$experienceIncrease);
            $result = $this->dataAccess->executeInUpDe("UPDATE user SET experience=experience+".$experienceIncrease.",level=".$level." WHERE id=".$userId);
            return $result;
        } else {
            return false;
        }
    }

    private function getLevel($experience){
        $level = 0;
        for ($i = 0;$i < 8;$i++){
            if ($experience >= (pow(2,$i)-1)*1000){
                $level++;
            } else {
                return $level;
            }
        }
        return 8;
    }
}