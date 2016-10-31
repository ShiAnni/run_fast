<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 运动没这个是最痛苦的！</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <!-[IF IE]>
    <link rel="stylesheet" type="text/css" href="../../assets/css/login-ie.css">
    <![endif]->
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
                                <label class="form-label hidden" for="user[name]">请输入用户名</label>
                                <input class="form-control input-block" id="user[name]" type="text" name="user[name]" autofocus="" placeholder="请输入用户名">
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label class="form-label hidden" for="user[password]">请输入密码</label>
                                <input class="form-control input-block" id="user[password]" type="password" name="user[password]" autofocus="" placeholder="请输入密码">
                            </dd>
                        </dl>
                        <button class="custom-btn btn-block" type="submit">登录</button>
                        <a href="/register"><button class="custom-btn btn-block" type="button">没有账号？注册一个</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>