<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 0:14
 */
require_once (dirname(__FILE__)."/../Model.php");
require_once (dirname(__FILE__)."/activityFactory.php");
class ActivityModel extends Model {
    function __construct(){
        parent::__construct();
    }

    function checkActivity($activityId){
        $result = $this->dataAccess->executeSelect("SELECT * FROM activity WHERE id = ".$activityId);
        $row = $result->fetchArray(SQLITE3_ASSOC);
        $xml = ActivityFactory::createActivity($row);
        return simplexml_import_dom($xml);
    }

    function addActivity($activity){
        $name = $activity->name[0];
        $description = $activity->description[0];
        $publisher = $activity->publisher[0];
        $publisherId = $activity->publisherId[0];
        $participate = $activity->participate[0];
        $upper = $activity->upper[0];
        $startDate = $activity->startDate[0];
        $endDate = $activity->endDate[0];
        $location = $activity->location[0];
        $levelLimit = $activity->limit[0];
        $this->dataAccess->executeInUpDe("INSERT INTO activity (name, description, publisher, publisherId, participate, upper, startDate, endDate, location,levelLimit) 
            VALUES('".$name."','".$description."','".$publisher."',".$publisherId.
            ",".$participate.",".$upper.",'".$startDate."','".$endDate."','".$location."',".$levelLimit.");");
        $id = $this->dataAccess->executeSelect("SELECT id FROM activity WHERE name = '".$name."';")->fetchArray();
        $result = $this->dataAccess->executeInUpDe("INSERT INTO participate VALUES (".$publisherId.",".$id["id"].");");
        return $result;
    }

    function activityList(){
        $today = date("Y-m-d h:i:s");
        $result = $this->dataAccess->executeSelect("SELECT * FROM activity WHERE startDate >='".$today."'");
        $xmlStr = <<<XML
<activityList>
</activityList>
XML;
        $xmlList = new DOMDocument();
        $xmlList->loadXML($xmlStr);
        for ($i = 0;$row = $result->fetchArray(SQLITE3_ASSOC);$i++) {
            $value = ActivityFactory::createActivity($row);
            $xmlList->getElementsByTagName("activityList")[0]->appendChild($xmlList->importNode($value->getElementsByTagName("activity")[0],true));
        }
        return simplexml_import_dom($xmlList);
    }

    function editActivity($activityId, $activity){
        $name = $activity->name[0];
        $description = $activity->description[0];
        $publisher = $activity->publisher[0];
        $publisherId = $activity->publisherId[0];
        $participate = $activity->participate[0];
        $upper = $activity->upper[0];
        $startDate = $activity->startDate[0];
        $endDate = $activity->endDate[0];
        $location = $activity->location[0];
        $levelLimit = $activity->limit[0];
        $result = $this->dataAccess->executeInUpDe("UPDATE activity SET name='".$name."',description='".$description."',publisher='".$publisher."',publisherId=".
            $publisherId.",participate=".$participate.",upper=".$upper.",startDate=".$startDate.",endDate=".$endDate.",location='".$location."',levelLimit=".$levelLimit." WHERE id=".
            $activityId.";"
            );
        return $result;
    }

    function joinActivity($activityId, $userId){
        $res = $this->dataAccess->executeSelect("SELECT * FROM participate WHERE userId=".$userId." AND activityId=".$activityId.";")->fetchArray();
        if ($res == false){
            $result = $this->dataAccess->executeInUpDe("INSERT INTO participate VALUES(".$userId.",".$activityId.");");
            if($result){
                $this->dataAccess->executeInUpDe("UPDATE activity SET participate=participate+1 WHERE id=".$activityId.";");
            }
            return $result;
        } else {
            return false;
        }
    }

    function deleteActivity($activityId){
        $result = $this->dataAccess->executeInUpDe("DELETE FROM activity WHERE id=".$activityId.";");
        if ($result){
            $this->dataAccess->executeInUpDe("DELETE FROM participate WHERE activityId=".$activityId.";");
        }

        return $result;
    }
}