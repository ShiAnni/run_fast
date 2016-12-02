<?php
require_once (dirname(__FILE__)."/controller/indexController/indexController.php");
$controller = new IndexController();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$name_err = "hidden";
$psw_err = "hidden";
$psw_again_err = "hidden";
if (count($arr) > 2){
    if ($arr[2] == "register"){
        $username = $_POST["user_name"];
        $psw = $_POST["user_password"];
        $psw_again = $_POST["user_password_again"];
        $isValid = true;
        if (!preg_match("/^[\x{4e00}-\x{9fa5}0-9a-zA-Z]+$/u",$username)){
            $name_err = "";
            $isValid = false;
        }
        if (!preg_match("/[0-9a-zA-Z_]{6,}/",$psw)){
            $psw_err = "";
            $isValid = false;
        }
        if (!($psw === $psw_again)){
            $psw_again_err = "";
            $isValid = false;
        }
        if ($isValid){
            $result = $controller->register($username, md5($psw));
            if (!$result){
                echo "<script type='text/javascript'>alert('注册失败！');</script>";
                header("Location: /register.php");
            } else {
                session_start();
                $_SESSION["id"] = (int)$result->userId[0];
                $_SESSION["name"] = $result->username[0];
                $_SESSION["face"] = $result->face[0];
                header("Location: /index.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 运动没这个是最痛苦的！</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/register.css">
    <!-[IF IE]>
    <link rel="stylesheet" type="text/css" href="/assets/css/login-ie.css">
    <![endif]->
    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/notify.min.js"></script>
</head>
<body>
<div role="main">
    <div class="jumbotron jumbotron-index">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <img src="/image/run_icon-100x100.png">
                </div>
                <div class="column">
                    <h1 class="title">跑得快 - 运动没这个是最痛苦的！</h1>
                </div>
            </div>
            <div class="columns">
                <div class="home column">
                    <h1>怎样让自己的运动变的更有趣？</h1>
                    <p>你可以通过<b>跑得快</b>应用，记录每天的运动情况，得到科学的数据评估。你可以在这里和各路运动大牛切磋，向他们学习一个。
                        你还可以在这里发布自己的运动动态，和大家交流你的人生经验。</p>
                </div>
                <div class="login column">
                    <form class="input_group" method="post" action="/register.php/register">
                        <dl>
                            <dd>
                                <label class="form-label <?php echo $name_err?>" for="user_name">用户名不正确！</label>
                                <input class="form-control input-block" id="user_name" type="text" name="user_name" placeholder="请输入用户名">
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label class="form-label <?php echo $psw_err?>" for="user_password">密码不正确！</label>
                                <input class="form-control input-block" id="user_password" type="password" name="user_password" placeholder="请输入密码" >
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label class="form-label <?php echo $psw_again_err?>" for="user_password_again">两次密码不一致！</label>
                                <input class="form-control input-block" id="user_password_again" type="password" name="user_password_again" placeholder="请再次输入密码" >
                            </dd>
                        </dl>
                        <button class="custom-btn btn-block" type="submit">注册</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>