<?php
require_once ("exerciseView.php");
$view = new ExerciseView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 运动数据</title>
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/exercise.css">
    <script type="text/javascript" src="../../assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript" src="../../assets/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#chart').highcharts({
                <?php
                    echo $view->getStatistics();
                ?>
//                chart: {
//                    type: 'column'
//                },
//                title: {
//                    text: '上周每日步数'
//                },
//                xAxis: {
//                    categories: [
//                        '10.10',
//                        '10.11',
//                        '10.12',
//                        '10.13',
//                        '10.14',
//                        '10.15',
//                        '10.16'
//                    ],
//                    crosshair: true
//                },
//                yAxis: {
//                    min: 0,
//                    title: {
//                        text: '步数'
//                    }
//                },
//                tooltip: {
//                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//                    '<td style="padding:0"><b>{point.y:.0f}步</b></td></tr>',
//                    footerFormat: '</table>',
//                    shared: true,
//                    useHTML: true
//                },
//                plotOptions: {
//                    column: {
//                        pointPadding: 0.2,
//                        borderWidth: 0
//                    }
//                },
//                series: [{
//                    name: '步数',
//                    data: [2412, 3413, 12311, 2341, 6455, 9867, 1231]
//                }]
            });
        });
    </script>
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
            $(".date_start").datetimepicker("setEndDate",new Date());
            $(".date_end").datetimepicker("setEndDate",new Date());
        });
    </script>
</head>
<body>
<?php include "../utilityView/banner.php" ?>
<div role="main">
    <div class="container content-first">
        <div class="common-columns exercise-data content">
            <div class="exercise-item">
                <img class="exercise-icon" src="../../image/shoe.png" alt="shoe" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日步数：</div>
                    <div class="common-column exercise-num"><?php echo $view->getWalkNum() ?></div>
                </div>
                <a class="plane-colored-btn btn row-btn" href="/data/walk">记录数据</a>
            </div>
            <div class="exercise-item">
                <img src="../../image/walking.png" alt="walk" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日健走距离：</div>
                    <div class="common-column exercise-num"><?php echo $view->getBriskDis() ?></div>
                </div>
                <div class="common-columns exercise-info">
                    <div class="common-column">今日健走速度：</div>
                    <div class="common-column exercise-num"><?php echo $view->getBriskVelocity() ?></div>
                </div>
                <a class="plane-colored-btn btn" href="/data/brisk">记录数据</a>
            </div>
            <div class="exercise-item">
                <img src="../../image/running.png" alt="run" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日跑步距离：</div>
                    <div class="common-column exercise-num"><?php echo $view->getRunDis() ?></div>
                </div>
                <div class="common-columns exercise-info">
                    <div class="common-column">今日跑步速度：</div>
                    <div class="common-column exercise-num"><?php echo $view->getRunVelocity() ?></div>
                </div>
                <a class="plane-colored-btn btn" href="/data/brisk">记录数据</a>
            </div>
        </div>
        <div class="health-data health-data content common-columns">
            <div class="health-item height">
                <img src="../../image/ruler.png" alt="ruler" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">身高：</div>
                    <div class="common-column exercise-num"><?php echo $view->getHeight() ?></div>
                </div>
                <a class="plane-colored-btn btn" href="/data/walk">记录数据</a>
            </div>
            <div class="health-item weight">
                <img src="../../image/scales.png" alt="scales" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">体重：</div>
                    <div class="common-column exercise-num"><?php echo $view->getWeight() ?></div>
                </div>
                <a class="plane-colored-btn btn" href="/data/brisk">记录数据</a>
            </div>
            <div class="health-item water">
                <img src="../../image/glass.png" alt="glass" width="100px" height="100px">
                <div class="common-columns exercise-info">
                    <div class="common-column">今日饮水量：</div>
                    <div class="common-column exercise-num"><?php echo $view->getWater() ?></div>
                </div>
                <a class="plane-colored-btn btn" href="/data/brisk">记录数据</a>
            </div>
        </div>
        <div class="data-statistics content">
            <div class="statistics-control common-columns">
                <div class="common-column control-group">
                    <select class="selectpicker">
                        <option>每日步数</option>
                        <option>健走距离</option>
                        <option>健走速度</option>
                        <option>跑步距离</option>
                        <option>跑步速度</option>
                        <option>体重</option>
                        <option>饮水量</option>
                        <option>上周每日平均步数</option>
                    </select>
                </div>
                <div class="common-columns common-column">
                    <label class="control-label common-column">开始时间</label>
                    <div class="input-group form_date common-columns common-column date date_start">
                        <input size="16" type="text" value="" class="form-control" readonly>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
                <div class="common-columns common-column">
                    <label class="control-label common-column">结束时间</label>
                    <div class="input-group form_date common-columns common-column date date_end">
                        <input size="16" type="text" value="" class="form-control" readonly>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
                <div class="common-column control-group">
                    <a class="btn colored-btn">确定</a>
                </div>
            </div>
            <div id="chart">

            </div>
        </div>
    </div>
</div>
</body>
</html>