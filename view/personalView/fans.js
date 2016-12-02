/**
 * Created by Lester on 2016/12/2.
 */
$(".un-focus").on("click", function(event){
    var id = $(event.target).attr("id");
    $.ajax ({
        type:"POST",
        url: "/view/personalView/personal.php/un-focus",
        data: {
            id: id
        },
        success: function(data){
            if(data == 1){
                location.reload();
            } else {
                alert("取消关注失败！");
            }
        }
    });
});
$(".focus").on("click", function(event){
    var id = $(event.target).attr("id");
    $.ajax ({
        type:"POST",
        url: "/view/personalView/personal.php/focus",
        data: {
            id: id
        },
        success: function(data){
            if(data == 1){
                location.reload();
            } else {
                alert("关注失败！");
            }
        }
    });
});