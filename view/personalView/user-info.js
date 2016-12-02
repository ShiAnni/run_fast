/**
 * Created by Lester on 2016/12/2.
 */
$(".un-focus").on("click", function(event){
    var url = window.location.href;
    var id = url.split("/")[5];
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
    var url = window.location.href;
    var id = url.split("/")[5];
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
$(".apply-friend").on("click", function(event){
    var url = window.location.href;
    var id = url.split("/")[5];
    $.ajax ({
        type:"POST",
        url: "/view/friendView/friend.php/apply",
        data: {
            id: id
        },
        success: function(data){
            if(data == 1){
                location.reload();
            } else {
                alert("申请好友失败！");
            }
        }
    });
});
$(".delete-friend").on("click", function(event){
    var url = window.location.href;
    var id = url.split("/")[5];
    $.ajax ({
        type:"POST",
        url: "/view/friendView/friend.php/delete",
        data: {
            id: id
        },
        success: function(data){
            if(data == 1){
                location.reload();
            } else {
                alert("删除好友失败！");
            }
        }
    });
});