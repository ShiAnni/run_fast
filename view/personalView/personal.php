<?php
require ("personalView.php");
$view = new PersonalView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 大清没有完的个人中心</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/personal.css">
</head>
<body>
<?php include "../utilityView/banner.php" ?>
<div role="main">
    <div class="content-container">
        <div class="personal-info content">
            <img class="info-face-img" src="<?php echo $view->getFace()?>" alt="<?php echo $view->getName()?>" width="100px" height="100px">
            <div class="personal-info-right">
                <div class="personal-introduction">
                    <div class="title">
                        <h2><?php echo $view->getName() ?></h2>
                        <div class="level">
                            <?php echo $view->getLevel() ?>
                        </div>
                    </div>
                    <div class="experience">
                        <div class="experience-title">经验值：</div>
                        <div class="experience-bar">
                            <div class="experience-bar-filled">

                            </div>
                        </div>
                        <div class="experience-num">
                            <?php echo $view->getExperience() ?>
                        </div>
                    </div>
                    <div class="personal-info-other">
                        <p><?php echo $view->getDescription() ?></p>
                        <span class="personal-info-span">
                            <span class="not-last-span"><?php echo $view->getGender() ?></span>
                            <span class="not-last-span"><?php echo $view->getLocation() ?></span>
                            <span><?php echo $view->getBirthday() ?></span>
                        </span>
                        <a class="edit-btn" href="/personal/edit">编辑</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal-social content">
            <div class="block">
                <div class="social-title">关注</div>
                <a href="/view/personalView/focus.html"><?php echo $view->getFocus() ?></a>
            </div>
            <div class="block">
                <div class="social-title">粉丝</div>
                <a href="/fans"><?php echo $view->getFans() ?></a>
            </div>
            <div class="block">
                <div class="social-title">私信</div>
                <a href="/message"><?php echo $view->getMessage() ?></a>
            </div>
            <div class="block">
                <div class="social-title">好友</div>
                <a href="/friends"><?php echo $view->getFriend() ?></a>
            </div>
        </div>
        <?php include $view->getContent() ?>
    </div>
</div>
</body>
</html>