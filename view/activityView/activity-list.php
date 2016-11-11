<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/9
 * Time: 15:09
 */
require_once ("activityinfoView.php");
$infoView = new ActivityInfoView();
?>
<div class="activity-content common-column content-first">
    <div class="activity-list">
        <div class="activity-list-item common-columns">
            <a href="/view/activityView/activity-info.html">
                <div class="activity-list-item-content">
                    <h2>玄武湖健走</h2>
                    <p>组队到玄武湖健走</p>
                    <div class="activity-info">
                        <div><div>活动时间：</div><div class="info-content">2016年10月22日-2016年10月25日</div></div>
                        <div><div>活动地点：</div><div class="info-content">南京市玄武湖</div></div>
                        <div><div>参与人数：</div><div class="info-content"><b>21/50</b></div></div>
                        <div><div>权限要求：</div><div class="info-content">1级</div></div>&nbsp;
                    </div>
                </div>
            </a>
            <a class="custom-btn plane-colored-btn btn-right" href="/delete_activity?activity_id=1">删除活动</a>
            <a class="custom-btn plane-colored-btn btn-right" href="/edit_activity?activity_id=1">编辑活动</a>
        </div>
        <div class="activity-list-item common-columns">
            <a href="/activity/2">
                <div class="activity-list-item-content">
                    <h2>登栖霞山</h2>
                    <p>登山运动</p>
                    <div class="activity-info">
                        <div><div>活动时间：</div><div class="info-content">2016年10月23日-2016年10月23日</div></div>
                        <div><div>活动地点：</div><div class="info-content">南京市栖霞山</div></div>
                        <div><div>参与人数：</div><div class="info-content"><b>5/20</b></div></div>
                        <div><div>权限要求：</div><div class="info-content">2级</div></div>&nbsp;
                    </div>
                </div>
            </a>
            <a class="custom-btn plane-colored-btn btn-right" href="/join_activity?activity_id=1">参加活动</a>
        </div>
    </div>
</div>
