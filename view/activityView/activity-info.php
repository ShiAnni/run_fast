<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 活动详情</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/activity.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/activity-info.css">
</head>
<body>
<header class="header" role="banner">
    <div class="container">
        <img class="head-logo" src="../../image/run_icon-50x50.png">
        <div class="head-menu">
            <nav class="head-nav">
                <a class="nav-item" href="/view/indexindex.html">主页</a>
                <a class="nav-item" href="/view/exerciseexercise.html">运动数据</a>
                <a class="nav-item nav-selected" href="/view/activityView/activity-list.html">活动</a>
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
<div class="common-columns">
    <div class="content-container common-column activity-nav">
        <div class="activity-aside">
            <a  href="/view/activityView/activity-list.html">
                <div class="activity-nav-item activity-first">
                    活动列表
                </div>
            </a>
            <a href="/view/activityView/activity-publish.html">
                <div class="activity-nav-item">
                    发布活动
                </div>
            </a>
        </div>
    </div>
    <div class="common-column content activity-info-content content-first">
        <div class="activity-info-item common-columns">
            <label class="common-column">活动名称</label>
            <div id="activity-name" class="common-column">玄武湖健走</div>
            <label class="common-column">活动发起者</label>
            <div id="activity-organizer" class="common-column">大清没有完</div>
        </div>
        <div class="activity-info-item common-columns">
            <label class="common-column">活动介绍</label>
            <div id="activity-intro" class="common-column">组队到玄武湖健走</div>
        </div>
        <div class="activity-info-item common-columns">
            <label class="common-column">活动人数</label>
            <div id="activity-people" class="common-column">21/50</div>
            <label class="common-column">活动参与权限</label>
            <div id="activity-level" class="common-column">1级</div>
        </div>
        <div class="activity-info-item common-columns">
            <label class="common-column">活动时间</label>
            <div id="activity-time" class="common-column">2016年10月22日-2016年10月25日</div>
            <label class="common-column">活动地点</label>
            <div id="activity-location" class="common-column">南京市玄武湖</div>
        </div>
        <div class="activity-info-item">
            <a class="btn-right custom-btn plane-colored-btn" href="/delete_activity?activity_id=1">删除活动</a>
            <a class="btn-right custom-btn plane-colored-btn" href="/edit_activity?activity_id=1">编辑活动</a>
        </div>
    </div>
</div>
</body>
</html>