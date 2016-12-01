<?php
require_once ("activityinfoView.php");
$infoView = new ActivityInfoView();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
if (count($arr) > 3){
    if ($arr[3] == "publish"){
        require_once (dirname(__FILE__)."/../../controller/activityController/publishController.php");
        $controller = new PublishController();
        $activity = new DOMDocument();
        $activity->load(dirname(__FILE__)."/../../data/activity.xml");
        $activity->getElementsByTagName("name")[0]->nodeValue = $_POST['name'];
        $activity->getElementsByTagName("description")[0]->nodeValue = $_POST['description'];
        $activity->getElementsByTagName("publisherId")[0]->nodeValue = BannerView::getBanner()->getId();
        $activity->getElementsByTagName("publisher")[0]->nodeValue = BannerView::getBanner()->getName();
        $activity->getElementsByTagName("participate")[0]->nodeValue = 1;
        $activity->getElementsByTagName("upper")[0]->nodeValue = $_POST['upper'];
        $activity->getElementsByTagName("startDate")[0]->nodeValue = $_POST['startDate'].":00";
        $activity->getElementsByTagName("endDate")[0]->nodeValue = $_POST['endDate'].":00";
        $activity->getElementsByTagName("location")[0]->nodeValue = $_POST['location'];
        $activity->getElementsByTagName("limit")[0]->nodeValue = substr($_POST['limit'],0,1);
        $controller->publish(simplexml_import_dom($activity));
        header("/activity.php/activity");
    }
}
?>
<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/bootstrap-select/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/assets/bootstrap-select/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/activity-publish.css">
<script type="text/javascript">
    $(document).ready(function() {
        $(".form_date").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            language: "zh-CN",
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 0,
            forceParse: 0,
            todayHighlight: true
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
<div class="content activity-publish common-column">
    <form method="post" action="/activity.php/publish/publish">
        <div class="common-columns publish-item">
            <label class="common-column activity-label">活动名称</label>
            <input type="text" class="form-control common-column activity-text" name="name">
        </div>
        <div class="common-columns publish-item">
            <label class="common-column activity-label">活动简介</label>
            <textarea class="form-control common-column activity-textarea" name="description"></textarea>
        </div>
        <div class="common-columns publish-item">
            <label class="common-column activity-label">活动人数上限</label>
            <input type="number" class="form-control common-column activity-text-small" min="1" name="upper">
            <label class="common-column activity-label">活动参加权限</label>
            <select class="form-control common-column activity-text-small" name="limit">
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
                <div class="input-group form_date common-columns date_start date common-column activity-text">
                    <input size="16" type="text" value="" class="form-control" readonly name="startDate">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="common-columns common-column">
                <label class="common-column activity-label">活动结束时间</label>
                <div class="input-group form_date common-columns date_end date common-column activity-text">
                    <input size="16" type="text" value="" class="form-control" readonly name="endDate">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="common-columns publish-item">
            <label class="common-column activity-label">活动地点</label>
            <input type="text" class="form-control activity-text" name="location">
        </div>
        <button class="custom-btn colored-btn publish-btn" type="submit">发布</button>
    </form>
</div>

