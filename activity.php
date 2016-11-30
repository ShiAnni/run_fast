<?php
require(dirname(__FILE__)."/view/activityView/activityView.php");
$view = new ActivityView();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
switch ($arr[1]){
    case "activity":
        if (!is_null($arr[2])){

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
parse_str($_SERVER["QUERY_STRING"],$param);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 活动</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/activity.css">
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