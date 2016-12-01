<?php
require_once (dirname(__FILE__)."/activityinfoView.php");
$infoView = new ActivityInfoView();
require_once (dirname(__FILE__)."/../../controller/activityController/activityController.php");
$controller = new ActivityController();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$result = $controller->check($arr[3]);
$infoView->setName($result->name[0]);
$infoView->setDescription($result->description[0]);
$infoView->setPublisher($result->publisher[0]);
$infoView->setNum($result->participate[0]);
$infoView->setUpper($result->upper[0]);
$infoView->setLimit($result->limit[0]);
$infoView->setStartTime($result->startDate[0]);
$infoView->setEndTime($result->endDate[0]);
$infoView->setLocation($result->location[0]);
$infoView->setId($result->id[0]);
$infoView->setPublisherId($result->publisherId[0]);
?>
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
        <div id="activity-level" class="common-column"><?php echo $infoView->getLimit()?></div>
    </div>
    <div class="activity-info-item common-columns">
        <label class="common-column">活动时间</label>
        <div id="activity-time" class="common-column"><?php echo $infoView->getStartTime()?>-<?php echo $infoView->getEndTime()?></div>
        <label class="common-column">活动地点</label>
        <div id="activity-location" class="common-column"><?php echo $infoView->getLocation() ?></div>
    </div>
    <div class="activity-info-item">
        <?php
        if ($infoView->getPublisherId() == BannerView::getBanner()->getId()){
            echo "<a class=\"btn-right custom-btn plane-colored-btn\" href=\"/activity.php/activity/delete/".$infoView->getId()."\">删除活动</a>";
        } else {
            echo "<a class=\"btn-right custom-btn plane-colored-btn\" href=\"/activity.php/activity/join/".$infoView->getId()."\">参加活动</a>";
        }
        ?>
    </div>
</div>