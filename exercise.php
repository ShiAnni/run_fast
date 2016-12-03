<?php
include_once (dirname(__FILE__)."/view/utilityView/prevent.php");
require_once(dirname(__FILE__)."/view/exerciseView/exerciseView.php");
BannerView::getBanner()->setSelected("exercise.php");
$view = new ExerciseView();
require_once (dirname(__FILE__)."/controller/exerciseController/exerciseController.php");
$controller = new ExerciseController();
$result = $controller->getTodayData($_SESSION["id"]);
foreach ($result->children() as $child){
    switch ($child->type[0]){
        case "walkNum":
            $view->setWalkNum($child->num[0]);
            break;
        case "briskDis":
            $view->setBriskDis($child->num[0]);
            break;
        case "briskVelocity":
            $view->setBriskVelocity($child->num[0]);
            break;
        case "runDis":
            $view->setRunDis($child->num[0]);
            break;
        case "runVelocity":
            $view->setRunVelocity($child->num[0]);
            break;
        case "height":
            $view->setHeight($child->num[0]);
            break;
        case "weight":
            $view->setWeight($child->num[0]);
            break;
        case "water":
            $view->setWater($child->num[0]);
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 运动数据</title>
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/exercise.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
</head>
<body>
<?php include "view/utilityView/banner.php" ?>
<div id="record">
    <div class="record-title">
        记录数据<a href="javascript:void(0)" class="close_btn" id="closeBtn">×</a>
    </div>
    <div class="record-row">
        <img id="record-icon" width="80px" height="80px">
    </div>
    <div class="record-row common-columns">
        <div class="record-label common-column" id="record-first-title"></div>
        <input class="form-control record-text common-column" type="text" id="record-text-first" />
    </div>
    <div class="record-row common-columns" id="record-row-second">
        <div class="record-label common-column" id="record-second-title"></div>
        <input class="form-control record-text common-column" type="text" id="record-text-second" />
    </div>
    <div class="record-row">
        <a class="plane-colored-btn btn record-confirm-btn">确认</a>
    </div>
</div>
<div role="main">
    <div class="container content-first">
        <div class="common-columns exercise-data content">
            <div class="exercise-item">
                <img class="exercise-icon" src="/image/shoe.png" alt="shoe" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日步数：</div>
                    <div class="common-column exercise-num"><?php echo $view->getWalkNum() ?>步</div>
                </div>
                <a id="walk" class="plane-colored-btn btn row-btn record-btn">记录数据</a>
            </div>
            <div class="exercise-item">
                <img src="/image/walking.png" alt="walk" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日健走距离：</div>
                    <div class="common-column exercise-num"><?php echo $view->getBriskDis() ?>km</div>
                </div>
                <div class="common-columns exercise-info">
                    <div class="common-column">今日健走速度：</div>
                    <div class="common-column exercise-num"><?php echo $view->getBriskVelocity() ?>km/h</div>
                </div>
                <a id="brisk" class="plane-colored-btn btn record-btn">记录数据</a>
            </div>
            <div class="exercise-item">
                <img src="/image/running.png" alt="run" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日跑步距离：</div>
                    <div class="common-column exercise-num"><?php echo $view->getRunDis() ?>km</div>
                </div>
                <div class="common-columns exercise-info">
                    <div class="common-column">今日跑步速度：</div>
                    <div class="common-column exercise-num"><?php echo $view->getRunVelocity() ?>km/h</div>
                </div>
                <a id="run"class="plane-colored-btn btn record-btn">记录数据</a>
            </div>
        </div>
        <div class="health-data health-data content common-columns">
            <div class="health-item height">
                <img src="/image/ruler.png" alt="ruler" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">身高：</div>
                    <div class="common-column exercise-num"><?php echo $view->getHeight() ?>cm</div>
                </div>
                <a id="height"class="plane-colored-btn btn record-btn">记录数据</a>
            </div>
            <div class="health-item weight">
                <img src="/image/scales.png" alt="scales" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">体重：</div>
                    <div class="common-column exercise-num"><?php echo $view->getWeight() ?>kg</div>
                </div>
                <a id="weight"class="plane-colored-btn btn record-btn">记录数据</a>
            </div>
            <div class="health-item water">
                <img src="/image/glass.png" alt="glass" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日饮水量：</div>
                    <div class="common-column exercise-num"><?php echo $view->getWater() ?>(<?php echo $view->getWater()*500 ?>ml)</div>
                </div>
                <a id="water"class="plane-colored-btn btn record-btn">记录数据</a>
            </div>
        </div>
        <div class="data-statistics content">
            <div class="statistics-control common-columns">
                <div class="common-column control-group">
                    <select class="form-control option-select">
                        <option value="walkNum">每日步数</option>
                        <option value="briskDis">健走距离</option>
                        <option value="briskVelocity">健走速度</option>
                        <option value="runDis">跑步距离</option>
                        <option value="runVelocity">跑步速度</option>
                        <option value="height">身高</option>
                        <option value="weight">体重</option>
                        <option value="water">饮水量</option>
                    </select>
                </div>
                <div class="common-columns common-column">
                    <label class="control-label common-column">开始时间</label>
                    <div class="input-group form_date common-columns common-column date date_start">
                        <input size="16" type="text" value="" class="form-control" readonly id="date_start">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
                <div class="common-columns common-column">
                    <label class="control-label common-column">结束时间</label>
                    <div class="input-group form_date common-columns common-column date date_end">
                        <input size="16" type="text" value="" class="form-control" readonly id="date_end">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
                <div class="common-column control-group">
                    <a class="btn colored-btn" id="statistic">确定</a>
                </div>
            </div>
            <div id="chart">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function chart(data) {
        $('#chart').highcharts(data);
    }
    function getData(type, startDate, endDate, statisticType){
        $.ajax({
            type: "POST",
            url: "/view/exerciseView/exercise.php/statistics",
            data :{
                type: type,
                startDate: startDate,
                endDate: endDate,
                statisticType: statisticType
            },
            success: function(data){
                chart(JSON.parse(data));
            }
        });
    }
    $(function () {
        var now = new Date();
        var startDate;
        var endDate;
        if(now.getDay() == 0){
            startDate = new Date(now.getFullYear(), now.getMonth(), (now.getDate()-now.getDay()-13));
            endDate = new Date(now.getFullYear(), now.getMonth(), (now.getDate()-now.getDay()-7));
        } else {
            startDate = new Date(now.getFullYear(), now.getMonth(), (now.getDate()-now.getDay()-6));
            endDate = new Date(now.getFullYear(), now.getMonth(), (now.getDate()-now.getDay()));
        }
        var startStr = startDate.getFullYear()+"-"+(startDate.getMonth()+1)+"-"+startDate.getDate();
        var endStr = endDate.getFullYear()+"-"+(endDate.getMonth()+1)+"-"+endDate.getDate();
        chart(getData("walkNum",startStr,endStr,""));
    });
    $("#statistic").on("click",function(event){
        var value = $(".option-select").val();
        var startDate = $("#date_start").val();
        if (startDate == ""){
            alert("请输入开始时间！");
            return;
        }
        var endDate = $("#date_end").val();
        if (endDate == ""){
            alert("请输入结束时间！");
            return;
        }
         var valArray = value.split("-");
        if (valArray.length > 1){
            getData(valArray[0], startDate, endDate, valArray[1]);
        } else {
            getData(value, startDate, endDate, "");
        }
    });
    $(".record-btn").on("click",function (event) {
        var id = $(event.target).attr("id");
        $("body").append("<div id='mask'></div>");
        $("#mask").addClass("mask").fadeIn("slow");
        $("#record").fadeIn("slow");
        $(".record-confirm-btn").attr("id",id+"-re");
        switch (id){
            case "walk":
                $("#record-icon").attr("src","/image/shoe.png");
                $("#record-first-title").html("今日步数");
                $("#record-row-second").css("display","none");
                break;
            case "brisk":
                $("#record-icon").attr("src","/image/walking.png");
                $("#record-first-title").html("今日健走距离(km)");
                $("#record-second-title").html("今日健走时间 ( h )");
                break;
            case "run":
                $("#record-icon").attr("src","/image/running.png");
                $("#record-first-title").html("今日跑步距离(km)");
                $("#record-second-title").html("今日跑步时间 ( h )");
                break;
            case "height":
                $("#record-icon").attr("src","/image/ruler.png");
                $("#record-first-title").html("身高(cm)");
                $("#record-row-second").css("display","none");
                break;
            case "weight":
                $("#record-icon").attr("src","/image/scales.png");
                $("#record-first-title").html("体重(kg)");
                $("#record-row-second").css("display","none");
                break;
            case "water":
                $("#record-icon").attr("src","/image/glass.png");
                $("#record-first-title").html("饮水量(500ml/杯)");
                $("#record-row-second").css("display","none");
                break;
        }
    });
    $(".close_btn").hover(function () { $(this).css({ color: 'black' }) }, function () { $(this).css({ color: '#999' }) }).on('click', function () {
        exitRecord();
    });
    $(".record-confirm-btn").on("click",function () {
        var id = $(".record-confirm-btn").attr("id");
        var regIn = /[0-9]+/;
        var regFl = /[0-9]+([.]{1}[0-9]+){0,1}/;
        switch (id){
            case "walk-re":
                var walkNum = $("#record-text-first").val();
                if(regIn.test(walkNum)){
                    $.ajax({
                        type:"POST",
                        data:{
                            num: 1,
                            type: "walkNum",
                            data: walkNum
                        },
                        url: "/view/exerciseView/exercise.php/record",
                        success: function (data) {
                            if(data == 1){
                                exitRecord();
                                location.reload();
                            } else {
                                alert("记录失败！")
                            }
                        }
                    });
                } else {
                    alert("数据格式不正确！")
                }
                break;
            case "brisk-re":
                var briskDis = $("#record-text-first").val();
                var briskTime = $("#record-text-second").val();
                if((regFl.test(briskDis))&&(regFl.test(briskTime))){
                    $.ajax({
                        type:"POST",
                        data:{
                            num: 2,
                            type: ["briskDis","briskVelocity"],
                            data: [briskDis, (briskDis/briskTime).toFixed(2)]
                        },
                        url: "/view/exerciseView/exercise.php/record",
                        success: function (data) {
                            if(data == 1){
                                exitRecord();
                                location.reload();
                            } else {
                                alert("记录失败！")
                            }
                        }
                    });
                } else {
                    alert("数据格式不正确！")
                }
                break;
            case "run-re":
                var runDis = $("#record-text-first").val();
                var runTime = $("#record-text-second").val();
                if((regFl.test(runDis))&&(regFl.test(runTime))){
                    $.ajax({
                        type:"POST",
                        data:{
                            num: 2,
                            type: ["runDis","runVelocity"],
                            data: [runDis, (runDis/runTime).toFixed(2)]
                        },
                        url: "/view/exerciseView/exercise.php/record",
                        success: function (data) {
                            if(data == 1){
                                exitRecord();
                                location.reload();
                            } else {
                                alert("记录失败！")
                            }
                        }
                    });
                } else {
                    alert("数据格式不正确！")
                }
                break;
            case "height-re":
                var height = $("#record-text-first").val();
                if(regFl.test(height)){
                    $.ajax({
                        type:"POST",
                        data:{
                            num: 1,
                            type: "height",
                            data: height
                        },
                        url: "/view/exerciseView/exercise.php/record",
                        success: function (data) {
                            if(data == 1){
                                exitRecord();
                                location.reload();
                            } else {
                                alert("记录失败！")
                            }
                        }
                    });
                } else {
                    alert("数据格式不正确！")
                }
                break;
            case "weight-re":
                var weight = $("#record-text-first").val();
                if(regFl.test(weight)){
                    $.ajax({
                        type:"POST",
                        data:{
                            num: 1,
                            type: "weight",
                            data: weight
                        },
                        url: "/view/exerciseView/exercise.php/record",
                        success: function (data) {
                            if(data == 1){
                                exitRecord();
                                location.reload();
                            } else {
                                alert("记录失败！")
                            }
                        }
                    });
                } else {
                    alert("数据格式不正确！")
                }
                break;
            case "water-re":
                var water = $("#record-text-first").val();
                if(regIn.test(water)){
                    $.ajax({
                        type:"POST",
                        data:{
                            num: 1,
                            type: "water",
                            data: water
                        },
                        url: "/view/exerciseView/exercise.php/record",
                        success: function (data) {
                            if(data == 1){
                                exitRecord();
                                location.reload();
                            } else {
                                alert("记录失败！")
                            }
                        }
                    });
                } else {
                    alert("数据格式不正确！")
                }
                break;
        }
    })
    function exitRecord(){
        $("#record").fadeOut("fast");
        $("#mask").css({ display: 'none' });
        $("#record-row-second").css("display","");
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".form_date").datetimepicker({
            format: "yyyy-mm-dd",
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
        $(".date_start").datetimepicker("setEndDate",new Date());
        $(".date_end").datetimepicker("setEndDate",new Date());
    });
</script>
</body>
</html>