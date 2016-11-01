<?php
require_once ("../View.php");
class ActivityView extends View {
    var $output = "haha";
}
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
<header class="header" role="banner">
    <div class="container">
        <img class="head-logo" src="../../image/run_icon-50x50.png">
        <div class="head-menu">
            <nav class="head-nav">
                <a class="nav-item" href="/view/indexindex.html">主页</a>
                <a class="nav-item" href="/view/exerciseexercise.html">运动数据</a>
                <a class="nav-item nav-selected" href="/view/activity/activity-list.html">活动</a>
            </nav>
            <div  class="personal-info-header">
                <div>
                    <a href="/view/personalpersonal.html">
                        <div class="info-btn">
                            <img class="face-img" src="../../image/faceimg.jpg" alt="大清没有完" width="50px" height="50px">
                            <p class="column">大清没有完</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<div role="main">
    <div class="common-columns">
        <div class="content-container common-column activity-nav">
            <div class="activity-aside">
                <a  href="/view/activity/activity-list.html">
                    <div class="activity-nav-item activity-first">
                        活动列表
                    </div>
                </a>
                <a href="/view/activity/activity-publish.html">
                    <div class="activity-nav-item activity-selected">
                        发布活动
                    </div>
                </a>
            </div>
        </div>
        <div class="activity-content common-column content-first">
            <div class="activity-list">
                <div class="activity-list-item common-columns">
                    <a href="/view/activity/activity-info.html">
                        <div class="activity-list-item-content">
                            <h2>玄武湖健走</h2>
                            <p>组队到玄武湖健走</p>
                            <div class="activity-info">
                                <div><div>活动时间：</div><div class="info-content">2016年10月22日-2016年10月25日</div></div>
                                <div><div>活动地点：</div><div class="info-content">南京市玄武湖</div></div>
                                <div><div>参与人数：</div><div class="info-content"><b>21/50</b></div></div>
                                <div><div>权限要求：</div><div class="info-content">1级</div></div>&nbsp;
                                <?php
                                echo $this->output;
                                ?>
                            </div>
                        </div>
                    </a>
                    <a class="custom-btn plane-colored-btn btn-right" href="/delete_activity?activity_id=1">删除活动</a>
                    <a class="custom-btn plane-colored-btn btn-right" href="/edit_activity?activity_id=1">编辑活动</a>
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
    </div>
</div>
</body>
</html>