<?php
require ("friendView.php");
$view = new FriendView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 好友</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/friend.css">
</head>
<body>
<?php include "../utilityView/banner.php" ?>
<div role="main">
    <div class="common-columns">
        <div class="content content-first friend-list common-column">
            <div class="friend-add friend-item">
                <a href="/friend-add">
                    <div class="common-columns">
                        <div class="friend-add-icon common-column">
                            +
                        </div>
                        <div class="friend-add-content common-column">
                            添加一个好友
                        </div>
                    </div>
                </a>
            </div>
            <div class="friend-item">
                <div class="common-columns">
                    <a href="/personal/umaru" class="common-column">
                        <div class="friend-info common-columns">
                            <div class="friend-face common-column">
                                <img class="friend-face-img" src="../../image/friend_face.png" alt="小埋">
                            </div>
                            <div class="friend-intro-name common-column">
                                <div class="friend-name">小埋</div>
                                <div class="friend-intro">吃睡玩三连击</div>
                            </div>
                        </div>
                    </a>
                    <a class= "custom-btn plane-colored-btn friend-btn" href="/delete">
                        删除
                    </a>
                </div>
            </div>
            <div class="friend-item">
                <div class="common-columns">
                    <a href="/personal/umaru" class="common-column">
                        <div class="friend-info common-columns">
                            <div class="friend-face common-column">
                                <img class="friend-face-img" src="../../image/friend_face_2.jpg" alt="学习一个">
                            </div>
                            <div class="friend-intro-name common-column">
                                <div class="friend-name">学习一个</div>
                                <div class="friend-intro">你们还是要提高自己的姿势水平</div>
                            </div>
                        </div>
                    </a>
                    <a class= "custom-btn plane-colored-btn friend-btn" href="/delete">
                        删除
                    </a>
                </div>
            </div>
        </div>
        <div class="content content-first friend-apply common-column">
            <div class="apply-title">好友申请</div>
            <div class="common-columns apply-item">
                <a href="/personal/vita">
                    <div class="friend-face common-column">
                        <img src="../../image/apply_face.jpg" alt="维他柠檬茶" class="friend-face-img">
                    </div>
                    <div class="friend-intro-name common-column">
                        <div>维他柠檬茶</div>
                        <div class="friend-intro">
                            Excuse me？
                        </div>
                    </div>
                </a>
                <a class="custom-btn plane-colored-btn friend-btn">
                    拒绝
                </a>
                <a class="custom-btn plane-colored-btn friend-btn">
                    同意
                </a>
            </div>
            <div class="common-columns apply-item">
                <a href="/personal/angry">
                    <div class="friend-face common-column">
                        <img src="../../image/apply_face_2.jpg" alt="爱姆安格瑞" class="friend-face-img">
                    </div>
                    <div class="friend-intro-name common-column">
                        <div>爱姆安格瑞</div>
                        <div class="friend-intro">
                            I'm angry!
                        </div>
                    </div>
                </a>
                <a class="custom-btn plane-colored-btn friend-btn">
                    拒绝
                </a>
                <a class="custom-btn plane-colored-btn friend-btn">
                    同意
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>