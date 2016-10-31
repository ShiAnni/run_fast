<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 发布活动</title>
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/activity.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/activity-publish.css">
    <script type="text/javascript" src="../../assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".form_date").datetimepicker({
                format: "yyyy年 MM dd日",
                language:  'zh-CN',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
            $(".date_start").datetimepicker().on("changeDate",function(ev){
                $(".date_end").datetimepicker("setStartDate", ev.date );
            });
            $(".date_end").datetimepicker().on("changeDate",function(ev){
                $(".date_start").datetimepicker("setEndDate", ev.date );
            });
            $(".date_start").datetimepicker("setStartDate",new Date());
            $(".date_end").datetimepicker("setStartDate",new Date());
        });
    </script>
</head>
<body>
<header class="header" role="banner">
    <div class="container">
        <img class="head-logo" src="../../image/run_icon-50x50.png">
        <div class="head-menu">
            <nav class="head-nav">
                <a class="nav-item" href="/view/indexindex.html">主页</a>
                <a class="nav-item" href="/view/exerciseexercise.html">运动数据</a>
                <a class="nav-item nav-selected" href="/view/activity/activity-list.html">活动</a>
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
<div class="main" role="main">
    <div class="common-columns">
        <div class="content-container common-column activity-nav">
            <div class="activity-aside">
                <a  href="/view/activity/activity-list.html">
                    <div class="activity-nav-item activity-first">
                        活动列表
                    </div>
                </a>
                <a href="/view/activity/activity-publish.html">
                    <div class="activity-nav-item activity-selected">
                        发布活动
                    </div>
                </a>
            </div>
        </div>
        <div class="content activity-publish common-column">
            <div class="common-columns publish-item">
                <label class="common-column activity-label">活动名称</label>
                <input type="text" class="form-control common-column activity-text">
            </div>
            <div class="common-columns publish-item">
                <label class="common-column activity-label">活动简介</label>
                <textarea class="form-control common-column activity-textarea"></textarea>
            </div>
            <div class="common-columns publish-item">
                <label class="common-column activity-label">活动人数上限</label>
                <input type="number" class="form-control common-column activity-text-small">
                <label class="common-column activity-label">活动参加权限</label>
                <select class="selectpicker">
                    <option>1级</option>
                    <option>2级</option>
                    <option>3级</option>
                    <option>4级</option>
                    <option>5级</option>
                    <option>6级</option>
                    <option>7级</option>
                    <option>8级</option>
                </select>
            </div>
            <div class="common-columns publish-item">
                <div class="common-columns common-column">
                    <label class="common-column activity-label">活动开始时间</label>
                    <div class="input-group form_date common-columns date_start date common-column">
                        <input size="16" type="text" value="" class="form-control" readonly>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
                <div class="common-columns common-column">
                    <label class="common-column activity-label">活动结束时间</label>
                    <div class="input-group form_date common-columns date_end date common-column">
                        <input size="16" type="text" value="" class="form-control" readonly>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
            </div>
            <div class="common-columns publish-item">
                <label class="common-column activity-label">活动地点</label>
                <input type="text" class="form-control activity-text">
            </div>
            <a class="custom-btn colored-btn publish-btn">发布</a>
        </div>
    </div>
</div>
</body>
</html>