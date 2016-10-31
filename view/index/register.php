<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 运动没这个是最痛苦的！</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/register.css">
    <!-[IF IE]>
    <link rel="stylesheet" type="text/css" href="../../assets/css/login-ie.css">
    <![endif]->
    <script type="text/javascript" src="../../assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/js/notify.min.js"></script>
    <script type="text/javascript">
        function check_username() {
            var user_name = $("#user_name").val();
            if (user_name == ""){
                $("#user_name").notify("请输入用户名！",{ position:"left"},"error");
            }
            if (user_name.length < 6 || user_name.length > 14){
                $("#user_name").notify("用户名长度应在6个到14个字符以内！",{ position:"left"},"error")
            }
        }
        function check_password() {
            var password = $("#user_password").val();
            if (password == ""){
                $("#user_password").notify("请输入密码！",{ position:"left"},"error");
            }
            if (password.length < 6){
                $("#user_password").notify("密码长度要大于6个字符！",{ position:"left"},"error");
            }
        }
        function check_password_again() {
            var password_again = $("#user_password_again").val();
            if (password_again == ""){
                $("#user_password_again").notify("请再输入一次密码！", { position:"left"}, "error");
            }
            if (password_again.length < 6){
                $("#user_password").notify("密码长度要大于6个字符！",{ position:"left"},"error");
            }
        }
    </script>
</head>
<body>
<div role="main">
    <div class="jumbotron jumbotron-index">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <img src="../../image/run_icon-100x100.png">
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
                    <form class="input_group" method="post" action="/personal">
                        <dl>
                            <dd>
                                <label class="form-label hidden" for="user_name">请输入用户名</label>
                                <input class="form-control input-block" id="user_name" type="text" name="user[name]" placeholder="请输入用户名" onblur="check_username()">
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label class="form-label hidden" for="user_password">请输入密码</label>
                                <input class="form-control input-block" id="user_password" type="password" name="user[password]" placeholder="请输入密码" onblur="check_password()">
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label class="form-label hidden" for="user_password_again">请再次输入密码</label>
                                <input class="form-control input-block" id="user_password_again" type="password" name="user[password]" placeholder="请输入密码" onblur="check_password_again()">
                            </dd>
                        </dl>
                        <button class="custom-btn btn-block" type="submit" onsubmit="submit_register()">注册</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>