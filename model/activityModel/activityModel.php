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
        $result = $this->dataAccess->executeSQL("SELECT * FROM activity WHERE id = ".$activityId);
        $row = $result->fetchArray(SQLITE3_ASSOC);
        $xml = ActivityFactory::createActivity($row);
        return $xml;
    }

    function addActivity($activity){
        $id = $activity->id[0];
        $name = $activity->name[0];
        $description = $activity->description[0];
        $publisher = $activity->publisher[0];
        $publisherId = $activity->publisherId[0];
        $participate = $activity->participate[0];
        $upper = $activity->upper[0];
        $startDate = $activity->startDate[0];
        $endDate = $activity->endDate[0];
        $levelLimit = $activity->limit[0];
        $result = $this->dataAccess->executeSQL("INSERT INTO activity VALUES(".$id.",'".$name."','".$description."','".$publisher."',".$publisherId.
            ",".$participate.",".$upper.",".$startDate.",".$endDate.",".$levelLimit.");");
        return $result;
    }

    function activityList(){
        $today = date("Y-m-d h:i:s");
        $result = $this->dataAccess->executeSQL("SELECT * FROM activity WHERE startDate >='".$today."'");
        $xmlStr = <<<XML
<activityList>
</activityList>
XML;
        $xmlList = new DOMDocument();
        $xmlList->loadXML($xmlStr);
        for ($i = 0;$row = $result->fetchArray(SQLITE3_ASSOC);$i++) {
            $value = ActivityFactory::createActivity($row);
            $xmlList->appendChild($value);
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
        $result = $this->dataAccess->executeSQL("UPDATE activity SET name='".$name."',description='".$description."',publisher='".$publisher."',publisherId=".
            $publisherId.",participate=".$participate.",upper=".$upper.",startDate=".$startDate.",endDate=".$endDate.",location='".$location."',levelLimit=".$levelLimit." WHERE id=".
            $activityId.";"
            );
        return $result;
    }

    function joinActivity($activityId, $userId){
        $result = $this->dataAccess->executeSQL("INSERT INTO participate VALUES(".$userId.",".$activityId.");");
        if (!$result){
            $this->view->error("参加活动失败！");
        } else {
            $this->dataAccess->executeSQL("UPDATE activity SET participate=particpate+1;");
        }
        return $result;
    }

    function deleteActivity($activityId){
        $result = $this->dataAccess->executeSQL("DELETE FROM activity WHERE id=".$activityId.";");
        if (!$result){
            $this->view->error("删除活动失败！");
        } else {
            $this->dataAccess->executeSQL("DELETE FROM participate WHERE activityId=".$activityId.";");
        }
        return $result;
    }
}