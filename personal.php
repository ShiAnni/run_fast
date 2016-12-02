<?php
include_once (dirname(__FILE__)."/view/utilityView/prevent.php");
require_once(dirname(__FILE__)."/view/personalView/personalView.php");
$view = new PersonalView();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$width = 0;
require_once (dirname(__FILE__)."/controller/personalController/personalController.php");
$controller = new PersonalController();
if (count($arr) > 3){
    if (preg_match("/[0-9]+/",$arr[3])){
        $result = $controller->getPersonalInfo($arr[3]);
        $view->setId($result->userId[0]);
        $view->setName($result->username[0]);
        $view->setFace($result->face[0]);
        $view->setLevel($result->level[0]." ".$result->levelName[0]);
        $view->setExperience($result->experience[0]."/".((pow(2,$result->level[0])-1)*1000));
        $width = ($result->experience[0]/(double)((pow(2,$result->level[0])-1)*1000)*100)."%";
        $view->setDescription($result->description[0]);
        $view->setGender($result->gender[0]);
        $view->setLocation($result->location[0]);
        $view->setBirthday($result->birthday[0]);

        $result = $controller->getInfoRight($arr[3]);
        $view->setFocus($result->focusNum[0]);
        $view->setFans($result->fansNum[0]);
        $view->setFriend($result->friendNum[0]);
    } else if ($arr[3] == "dynamic"){
        require_once (dirname(__FILE__)."/controller/personalController/dynamicsController.php");
        $view->setContent("view/personalView/dynamics.php");
        $dController = new DynamicsController();
        switch ($arr[4]){
            case "refresh":
                break;
            case "send":
                echo true;
                exit();
                break;
        }
    } else if ($arr[3] == "focus"){
        $view->setContent("view/personalView/focus.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - <?php echo $view->getName()?>的个人中心</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/personal.css">
</head>
<body>
<?php include dirname(__FILE__)."/view/utilityView/banner.php" ?>
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
                            <div class="experience-bar-filled" style="width: <?php echo $width?>">

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
                        <a class="edit-btn" href="/personal.php/edit/<?php echo $view->getId()?>">编辑</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal-social content">
            <div class="block">
                <div class="social-title">关注</div>
                <a href="/personal.php/focus/<?php echo $view->getId()?>"><?php echo $view->getFocus() ?></a>
            </div>
            <div class="block">
                <div class="social-title">粉丝</div>
                <a href="/personal.php/fans/<?php echo $view->getId()?>"><?php echo $view->getFans() ?></a>
            </div>
            <div class="block">
                <div class="social-title">好友</div>
                <a href="/friends.php/friend/<?php echo $view->getId()?>"><?php echo $view->getFriend() ?></a>
            </div>
        </div>
        <?php include $view->getContent() ?>
    </div>
</div>
</body>
</html>