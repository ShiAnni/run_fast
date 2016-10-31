<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 权限管理</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="assets/css/authority.css">
</head>
<body>
<header class="header" role="banner">
    <div class="container">
        <img class="head-logo" src="image/run_icon-50x50.png">
        <div class="head-menu">
            <nav class="head-nav">
                <a class="nav-item" href="/index.html">主页</a>
                <a class="nav-item" href="/data">运动数据</a>
                <a class="nav-item" href="/activity">活动</a>
                <a class="nav-item nav-selected" href="/authority.html">权限管理</a>
            </nav>
        </div>
        <a href="/personal/da-qing-mei-you-wan">
            <div  class="personal-info-header">
                <div class="info-btn">
                    <img class="face-img" src="image/manager.jpg" alt="doge" width="50px" height="50px">
                    <p class="column">doge</p>
                </div>
            </div>
        </a>
    </div>
</header>
<div role="main">
    <div class="content content-first user-list">
        <div class="user-item user-search common-columns">
            <input type="text" class="form-control common-column search-text" placeholder="搜索用户">
            <a class="custom-btn colored-btn common-column search-btn">搜索</a>
            <a class="custom-btn colored-btn common-column">封禁列表</a>
        </div>
        <div class="user-item common-columns">
            <img src="image/faceimg.jpg" class="user-face list-face-img common-column">
            <div class="common-column user-name">大清没有完</div>
            <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
            <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
        </div>
        <div class="user-item common-columns">
            <img src="image/manager.jpg" class="user-face list-face-img common-column">
            <div class="common-column user-name">doge</div>
            <a class="user-btn custom-btn plane-colored-btn btn-disabled">解除管理员</a>
            <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
        </div>
        <div class="user-item common-columns">
            <img src="image/friend_face.png" class="user-face list-face-img common-column">
            <div class="common-column user-name">小埋</div>
            <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
            <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
        </div>
        <div class="user-item common-columns">
            <img src="image/friend_face_2.jpg" class="user-face list-face-img common-column">
            <div class="common-column user-name">学习一个</div>
            <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
            <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
        </div>
        <div class="user-item common-columns">
            <img src="image/apply_face.jpg" class="user-face list-face-img common-column">
            <div class="common-column user-name">维他柠檬茶</div>
            <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
            <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
        </div>
        <div class="user-item common-columns">
            <img src="image/apply_face_2.jpg" class="user-face list-face-img common-column">
            <div class="common-column user-name">爱姆安格瑞</div>
            <a class="user-btn custom-btn plane-colored-btn" href="/set_manager">设为管理员</a>
            <a class="user-btn custom-btn plane-colored-btn" href="/ban">封禁</a>
        </div>
    </div>
</div>
</body>
</html>