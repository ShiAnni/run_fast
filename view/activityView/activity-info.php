<?php
require_once ("activityinfoView.php");
$infoView = new ActivityInfoView();
?>
<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" type="text/css" href="../../assets/css/activity-info.css">
<div class="common-column content activity-info-content content-first">
    <div class="activity-info-item common-columns">
        <label class="common-column">活动名称</label>
        <div id="activity-name" class="common-column"><?php echo $infoView->getName(); ?></div>
        <label class="common-column">活动发起者</label>
        <div id="activity-organizer" class="common-column"><?php echo $infoView->getPublisher(); ?></div>
    </div>
    <div class="activity-info-item common-columns">
        <label class="common-column">活动介绍</label>
        <div id="activity-intro" class="common-column"><?php echo $infoView->getDescription() ?></div>
    </div>
    <div class="activity-info-item common-columns">
        <label class="common-column">活动人数</label>
        <div id="activity-people" class="common-column"><?php echo $infoView->getNum()?>/<?php echo $infoView->getUpper()?></div>
        <label class="common-column">活动参与权限</label>
        <div id="activity-level" class="common-column"><?php echo $infoView->getLimit()?>级</div>
    </div>
    <div class="activity-info-item common-columns">
        <label class="common-column">活动时间</label>
        <div id="activity-time" class="common-column"><?php echo $infoView->getStartTime()?>-<?php echo $infoView->getEndTime()?></div>
        <label class="common-column">活动地点</label>
        <div id="activity-location" class="common-column"><?php echo $infoView->getLocation() ?></div>
    </div>
    <div class="activity-info-item">
        <a class="btn-right custom-btn plane-colored-btn" href="/delete_activity?activity_id=1">删除活动</a>
        <a class="btn-right custom-btn plane-colored-btn" href="/edit_activity?activity_id=1">编辑活动</a>
    </div>
</div>
</body>
</html>