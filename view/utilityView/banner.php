<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/9
 * Time: 8:25
 */
require_once ("bannerView.php");
$bannerView = BannerView::getBanner();
?>
<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" type="text/css" href="/../../assets/css/common.css">
<header class="header" role="banner">
    <div class="container">
        <img class="head-logo" src="/../../image/run_icon-50x50.png">
        <div class="head-menu">
            <nav class="head-nav">
                <a class="nav-item <?php if($bannerView->getSelected() == "index.php"){echo "nav-selected";}  ?>" href="/index.php">主页</a>
                <a class="nav-item <?php if($bannerView->getSelected() == "exercise.php"){echo "nav-selected";}  ?>" href="/exercise.php">运动数据</a>
                <a class="nav-item <?php if($bannerView->getSelected() == "activity.php"){echo "nav-selected";}  ?>" href="/activity.php">活动</a>
                <?php if ($bannerView->getIsManager()) {
                    echo "<a class=\"nav-item ";
                    if ($bannerView->getSelected() == "authority.php"){
                        echo "nav-selected";
                    }
                    echo "\" href=\"/authority.php\">权限管理</a>";
                } ?>
            </nav>
            <div  class="personal-info-header">
                <div class="common-column">
                    <a href="/personal.php/personal/<?php echo $bannerView->getId() ?>">
                        <div class="info-btn">
                            <img class="face-img" src="<?php echo $bannerView->getFace()?>" alt="<?php echo $bannerView->getName()?>" width="50px" height="50px">
                            <p class="column"><?php echo $bannerView->getName()?></p>
                        </div>
                    </a>
                </div>
                <a class="common-column logout" href="/index.php/logout">注销</a>
            </div>
        </div>
    </div>
</header>
</html>