<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/9
 * Time: 15:09
 */
require_once ("activitylistView.php");
$listView = new ActivityListView();
require_once (dirname(__FILE__)."/../../controller/activityController/activityController.php");
$controller = new ActivityController();
$xmlList = $controller->activities();
$listStr = "";
foreach ($xmlList->children() as $item){
    $listStr.= "<div class=\"activity-list-item common-columns\"><a href=\"/activity.php/activity/";
    $listStr.= $item->id[0];
    $listStr.= "\"><div class=\"activity-list-item-content\"><h2>";
    $listStr.= $item->name[0];
    $listStr.= "</h2><p>";
    $listStr.= $item->description[0];
    $listStr.= "</p><div class=\"activity-info\"><div><div>活动时间：</div><div class=\"info-content\">";
    $listStr.= $item->startDate[0]."-".$item->endDate[0];
    $listStr.= "</div></div><div><div>活动地点：</div><div class=\"info-content\">";
    $listStr.= $item->location[0];
    $listStr.= "</div></div><div><div>参与人数：</div><div class=\"info-content\"><b>";
    $listStr.= $item->participate[0]."/".$item->upper[0];
    $listStr.= "</b></div></div><div><div>权限要求：</div><div class=\"info-content\">";
    $listStr.= $item->limit[0];
    $listStr.= "</div></div>&nbsp;</div></div> </a><a class=\"custom-btn plane-colored-btn btn-right delete-act\" href=\"/activity.php/activity/delete/";
    $listStr.= $item->id[0];
    $listStr.= "\">删除活动</a><a class=\"custom-btn plane-colored-btn btn-right edit-act\" href=\"/activity.php/activity/edit/";
    $listStr.= $item->id[0];
    $listStr.= "\">编辑活动</a></div>";
}
echo $listStr;
$listView->setList($listStr);
?>
<div class="activity-content common-column content-first">
    <div class="activity-list">
        <?php
        echo $listView->getList();
        ?>
        <div class="activity-list-item common-columns">
            <a href="/activity.php/activity/1">
                <div class="activity-list-item-content">
                    <h2>玄武湖健走</h2>
                    <p>组队到玄武湖健走</p>
                    <div class="activity-info">
                        <div><div>活动时间：</div><div class="info-content">2016年10月22日-2016年10月25日</div></div>
                        <div><div>活动地点：</div><div class="info-content">南京市玄武湖</div></div>
                        <div><div>参与人数：</div><div class="info-content"><b>21/50</b></div></div>
                        <div><div>权限要求：</div><div class="info-content">1级</div></div>&nbsp;
                    </div>
                </div>
            </a>
            <a class="custom-btn plane-colored-btn btn-right delete-act" href="/activity.php/activity/delete/1">删除活动</a>
            <a class="custom-btn plane-colored-btn btn-right edit-act" href="/activity.php/activity/edit/1">编辑活动</a>
        </div>
        <div class="activity-list-item common-columns">
            <a href="/activity/2">
                <div class="activity-list-item-content">
                    <h2>登栖霞山</h2>
                    <p>登山运动</p>
                    <div class="activity-info">
                        <div><div>活动时间：</div><div class="info-content">2016年10月23日-2016年10月23日</div></div>
                        <div><div>活动地点：</div><div class="info-content">南京市栖霞山</div></div>
                        <div><div>参与人数：</div><div class="info-content"><b>5/20</b></div></div>
                        <div><div>权限要求：</div><div class="info-content">2级</div></div>&nbsp;
                    </div>
                </div>
            </a>
            <a class="custom-btn plane-colored-btn btn-right" href="/join_activity?activity_id=1">参加活动</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

</script>
