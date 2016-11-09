<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/9
 * Time: 8:25
 */
require_once ("bannerView.php");
$view = new BannerView();
?>
<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
<header class="header" role="banner">
    <div class="container">
        <img class="head-logo" src="../../image/run_icon-50x50.png">
        <div class="head-menu">
            <nav class="head-nav">
                <a class="nav-item <?php if($view->getSelected() == "index.php"){echo "nav-selected";}  ?>" href="/view/indexindex.html">主页</a>
                <a class="nav-item <?php if($view->getSelected() == "exercise.php"){echo "nav-selected";}  ?>" href="/view/exerciseexercise.html">运动数据</a>
                <a class="nav-item <?php if($view->getSelected() == "activity.php"){echo "nav-selected";}  ?>" href="/view/activityView/activity-list.html">活动</a>
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
</html>