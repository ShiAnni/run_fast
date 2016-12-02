<?php
include_once dirname(__FILE__)."/view/utilityView/prevent.php";
require_once (dirname(__FILE__)."/view/indexView/indexView.php");
$view = new IndexView();
require_once (dirname(__FILE__)."/controller/activityController/activityController.php");
BannerView::getBanner()->setSelected("index.php");
require_once (dirname(__FILE__)."/controller/indexController/indexController.php");
$controller = new IndexController();
$result = $controller->initialize();

$newsList = $result->newsList;
$newsStr = "";
foreach ($newsList->children() as $child){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/view/indexView/index-info.html");
    $itemHtml->getElementsByTagName("a")[0]->appendChild($itemHtml->createTextNode($child->title[0]));
    $itemHtml->getElementsByTagName("div")[0]->appendChild($itemHtml->createTextNode($child->time[0]));
    $newsStr.= $itemHtml->saveHTML();
}
$view->setNews($newsStr);

$announcementList = $result->announcementList;
$announcementStr = "";
foreach ($announcementList->children() as $child){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/view/indexView/index-info.html");
    $itemHtml->getElementsByTagName("a")[0]->appendChild($itemHtml->createTextNode($child->title[0]));
    $itemHtml->getElementsByTagName("div")[0]->appendChild($itemHtml->createTextNode($child->time[0]));
    $announcementStr.= $itemHtml->saveHTML();
}
$view->setAnnouncements($announcementStr);

$activityList = $result->activityList;
$activityStr = "";
foreach ($activityList->children() as $child){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/view/indexView/activity-info.html");
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/activity.php/activity/".$child->id[0]);
    $itemHtml->getElementsByTagName("a")[0]->appendChild($itemHtml->createTextNode($child->title[0]));
    $itemHtml->getElementsByTagName("div")[0]->appendChild($itemHtml->createTextNode($child->time[0]));
    $activityStr.= $itemHtml->saveHTML();
}
$view->setActivities($activityStr);

$rank = $result->rank;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 运动没这个是最痛苦的！</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
</head>
<body>
<?php include dirname(__FILE__)."/view/utilityView/banner.php" ?>
<div role="main">
    <div class="common-columns index-row">
        <div class="announcement common-column content content-first index-item item-left">
            <div class="title">网站公告</div>
            <ul class="news-ul">
                <?php echo $view->getAnnouncements()?>
            </ul>
        </div>
        <div class="news common-column content content-first index-item">
            <div class="title">网站新闻</div>
            <ul class="news-ul">
                <?php echo $view->getNews()?>
            </ul>
        </div>
    </div>
    <div class="common-columns index-row">
        <div class="activity common-column content index-item item-left">
            <div class="title">最新活动</div>
            <ul class="news-ul">
                <?php echo $view->getActivities()?>
            </ul>
        </div>
        <div class="rank common-column content index-item">
            <div class="title">运动排名</div>
            <ul class="rank-ul">
                <?php echo $view->getRank()?>
                <li class="common-columns">
                    <a>
                        <div class="rank-num rank-first common-column">1</div>
                        <img src="image/faceimg.jpg" class="list-face-img rank-face common-column">
                        <div class="rank-name common-column">大清没有完</div>
                        <div class="element-right rank-data">12392步</div>
                    </a>
                </li>
                <li class="common-columns">
                    <a>
                        <div class="rank-num rank-second common-column">2</div>
                        <img src="image/manager.jpg" class="list-face-img rank-face common-column">
                        <div class="rank-name common-column">doge</div>
                        <div class="element-right rank-data">11232步</div>
                    </a>
                </li>
                <li class="common-columns">
                    <a href="/view/personaluser-info.html">
                        <div class="rank-num rank-third common-column">3</div>
                        <img src="image/friend_face_2.jpg" class="list-face-img rank-face common-column">
                        <div class="rank-name common-column">学习一个</div>
                        <div class="element-right rank-data">10010步</div>
                    </a>
                </li>
                <li class="common-columns">
                    <a>
                        <div class="rank-num common-column">4</div>
                        <img src="image/apply_face.jpg" class="list-face-img rank-face common-column">
                        <div class="rank-name common-column">维他柠檬茶</div>
                        <div class="element-right rank-data">8632步</div>
                    </a>
                </li>
                <li class="common-columns">
                    <a>
                        <div class="rank-num common-column">5</div>
                        <img src="image/friend_face.png" class="list-face-img rank-face common-column">
                        <div class="rank-name common-column">小埋</div>
                        <div class="element-right rank-data">3412步</div>
                    </a>
                </li>
                <li class="common-columns">
                    <a>
                        <div class="rank-num common-column">6</div>
                        <img src="image/apply_face_2.jpg" class="list-face-img rank-face common-column">
                        <div class="rank-name common-column">爱姆安格瑞</div>
                        <div class="element-right rank-data">1012步</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>