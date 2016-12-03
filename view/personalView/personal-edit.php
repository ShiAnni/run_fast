
<div class="personal-info content common-columns">
    <div class="common-column">
        <img class="info-face-img" src="<?php echo $view->getFace()?>" alt="<?php echo $view->getName()?>" width="100px" height="100px">
    </div>
    <div class="personal-info-right common-column">
        <div class="personal-introduction">
            <div class="title">
                <h2><?php echo $view->getName() ?></h2>
            </div>
            <div class="common-columns edit-item">
                <label class="common-column personal-label">个人简介</label>
                <textarea class="form-control common-column" id="edit-area" draggable="false" name="description"><?php echo $view->getDescription() ?></textarea>
            </div>
            <div class="common-columns edit-item">
                <label class="common-column personal-label gender-label">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</label>
                <div class="common-column common-columns radio">
                    <label class="common-column personal-label">
                        <input class="common-column" type="radio" name="gender" <?php if ($view->getGender() == '男') echo "checked='checked'"; ?> value="男">男
                    </label>
                    <label class="common-column personal-label">
                        <input class="common-column" type="radio" name="gender" <?php if ($view->getGender() == '女') echo "checked='checked'"; ?> value="女">女
                    </label>
                </div>
            </div>
            <div class="common-columns edit-item">
                <label class="common-column personal-label">所&nbsp;&nbsp;在&nbsp;&nbsp;地</label>
                <input type="text" class="common-column form-control location-text" value="<?php echo $view->getLocation() ?>">
            </div>
            <div class="common-columns edit-item">
                <label class="common-column personal-label">生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</label>
                <div class="input-group form_date common-columns date common-column location-text">
                    <input size="16" type="text" value="<?php echo $view->getBirthday() ?>" id="birthday" class="form-control" readonly name="birthday">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="personal-info-other">
                <a class="custom-btn plane-colored-btn user-info-btn" id="edit-confirm">确定编辑</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".form_date").datetimepicker({
            format: "yyyy-mm-dd",
            language: "zh-CN",
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            todayHighlight: true
        });
        $(".form_date").datetimepicker("setEndDate",new Date());
    });
    $("#edit-confirm").on("click",function () {
       var description = $("#edit-area").val();
       var gender = $("input:radio:checked").val();
       var location = $(".location-text").val();
       var birthday = $("#birthday").val();
       $.ajax({
           type:"POST",
           url: "/view/personalView/personal.php/edit",
           data:{
               description: description,
               gender : gender,
               location : location,
               birthday : birthday
           },
           success :function (data) {
               if (data == 1){
                   var url = window.location.href.split("/");
                   window.location.href = "/personal.php/personal/"+url[5];
               } else {
                   alert("编辑失败！");
               }
           }
       });
    });
</script>