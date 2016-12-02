<?php
/**
 * Created by PhpStorm.
 * User: WillLester
 * Date: 2016/11/11
 * Time: 11:19
 */
require_once (dirname(__FILE__)."/authoritylistView.php");
$listView = new AuthorityListView();
require_once (dirname(__FILE__)."/../../controller/authorityController/authorityController.php");
$controller = new AuthorityController();
$result = $controller->getUserList();
?>
<div class="content content-first user-list">
    <div class="user-item user-search common-columns">
        <input type="text" class="form-control common-column search-text" placeholder="搜索用户">
        <a class="custom-btn colored-btn common-column search-btn">搜索</a>
    </div>
    <?php
    echo $listView->getList();
    ?>
    <div class="user-item common-columns">
        <img src="../../image/faceimg.jpg" class="user-face list-face-img common-column">
        <div class="common-column user-name">大清没有完</div>
        <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
        <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
    </div>
    <div class="user-item common-columns">
        <img src="../../image/manager.jpg" class="user-face list-face-img common-column">
        <div class="common-column user-name">doge</div>
        <a class="user-btn custom-btn plane-colored-btn btn-disabled">解除管理员</a>
        <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
    </div>
    <div class="user-item common-columns">
        <img src="../../image/friend_face.png" class="user-face list-face-img common-column">
        <div class="common-column user-name">小埋</div>
        <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
        <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
    </div>
    <div class="user-item common-columns">
        <img src="../../image/friend_face_2.jpg" class="user-face list-face-img common-column">
        <div class="common-column user-name">学习一个</div>
        <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
        <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
    </div>
    <div class="user-item common-columns">
        <img src="../../image/apply_face.jpg" class="user-face list-face-img common-column">
        <div class="common-column user-name">维他柠檬茶</div>
        <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
        <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
    </div>
    <div class="user-item common-columns">
        <img src="../../image/apply_face_2.jpg" class="user-face list-face-img common-column">
        <div class="common-column user-name">爱姆安格瑞</div>
        <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
        <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
    </div>
</div>
