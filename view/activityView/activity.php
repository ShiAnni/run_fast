<?php
require_once ("activityView.php");
$view = new ActivityView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 活动</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/activity.css">
</head>
<body>
<?php
    include "../utilityView/banner.php";
?>
<div role="main">
    <div class="common-columns">
        <div class="content-container common-column activity-nav">
            <div class="activity-aside">
                <a  href="/view/activityView/activity-list.html">
                    <div class="activity-nav-item activity-first <?php if($view->getContent() == "activity-list.php"){echo "activity-selected";} ?>">
                        活动列表
                    </div>
                </a>
                <a href="/view/activityView/activity-publish.html">
                    <div class="activity-nav-item <?php if($view->getContent() == "activity-publish.php"){echo "activity-selected";} ?>">
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