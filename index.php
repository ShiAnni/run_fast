<?php
include_once dirname(__FILE__)."/view/utilityView/prevent.php";
require_once (dirname(__FILE__)."/view/indexView/indexView.php");
$view = new IndexView();
require_once (dirname(__FILE__)."/controller/activityController/activityController.php");
BannerView::getBanner()->setSelected("index.php");
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
if (count($arr) > 2){
    if ($arr[2] == "logout"){
        $_SESSION["id"] = null;
        $_SESSION["name"] = null;
        $_SESSION["face"] = null;
        $_SESSION["isManager"] = null;
        header("Location: /login.php");
        exit();
    }
}
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
$rankStr = "";
$i = 1;
foreach ($rank->children() as $child){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/view/indexView/rank-info.html");
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/personal.php/person/".$child->userId[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$child->face[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$child->username[0]);
    $itemHtml->getElementsByTagName("div")[0]->appendChild($itemHtml->createTextNode($i));
    switch ($i){
        case 1:
            $itemHtml->getElementsByTagName("div")[0]->setAttribute("class","rank-num rank-first common-column");
            break;
        case 2:
            $itemHtml->getElementsByTagName("div")[0]->setAttribute("class","rank-num rank-second common-column");
            break;
        case 3:
            $itemHtml->getElementsByTagName("div")[0]->setAttribute("class","rank-num rank-third common-column");
            break;
        default:
            $itemHtml->getElementsByTagName("div")[0]->setAttribute("class","rank-num common-column");
            break;
    }
    $itemHtml->getElementsByTagName("div")[1]->appendChild($itemHtml->createTextNode($child->username[0]));
    $itemHtml->getElementsByTagName("div")[2]->appendChild($itemHtml->createTextNode($child->num[0]."步"));
    $i++;
    $rankStr.= $itemHtml->saveHTML();
}
$view->setRank($rankStr);
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
            </ul>
        </div>
    </div>
</div>
</body>
</html>