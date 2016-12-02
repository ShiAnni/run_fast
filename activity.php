<?php
include_once dirname(__FILE__)."/view/utilityView/prevent.php";
require(dirname(__FILE__)."/view/activityView/activityView.php");
$view = new ActivityView();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
require_once (dirname(__FILE__)."/controller/activityController/activityController.php");
BannerView::getBanner()->setSelected("activity.php");
$controller = new ActivityController();
if (count($arr) > 2){
    switch ($arr[2]){
        case "activity":
            if (count($arr) > 3){
                if (preg_match("/[0-9]+/",$arr[3])){
                    $view->setTag("activity-info");
                    $view->setContent("view/activityView/activity-info.php");
                } else if ($arr[3] == "delete"){
                    $controller->delete($arr[4]);
                    header("Location: /activity.php/activity");
                    exit();
                } else if ($arr[3] == "join"){
                    $controller->join($arr[4], BannerView::getBanner()->getId());
                    header("Location: /activity.php/activity");
                    exit();
                }
            } else {
                $view->setTag("activity-list");
                $view->setContent("view/activityView/activity-list.php");
            }
            break;
        case "publish":
            $view->setTag("activity-publish");
            $view->setContent("view/activityView/activity-publish.php");
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 活动</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/activity.css">
    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<?php
    include "view/utilityView/banner.php";
?>
<div role="main">
    <div class="common-columns">
        <div class="content-container common-column activity-nav">
            <div class="activity-aside">
                <a  href="/activity.php/activity">
                    <div class="activity-nav-item activity-first <?php if($view->getTag() == "activity-list"){echo "activity-selected";} ?>">
                        活动列表
                    </div>
                </a>
                <a href="/activity.php/publish">
                    <div class="activity-nav-item <?php if($view->getTag() == "activity-publish"){echo "activity-selected";} ?>">
                        发布活动
                    </div>
                </a>
            </div>
        </div>
        <?php
        include $view->getContent();
        ?>
    </div>
</div>
</body>
</html>