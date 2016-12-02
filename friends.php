<?php
include_once (dirname(__FILE__)."/view/utilityView/prevent.php");
require_once(dirname(__FILE__)."/view/friendView/friendView.php");
$view = new FriendView();
require_once (dirname(__FILE__)."/controller/friendController/friendController.php");
$controller = new FriendController();
$result = $controller->friendList($_SESSION["id"]);
$xmlStr = "";
foreach ($result->children() as $item){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/view/friendView/friend-info.html");
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/personal.php/personal/".$item->userId[0]);
    $itemHtml->getElementsByTagName("a")[1]->setAttribute("id",$item->userId[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$item->face[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$item->username[0]);
    $itemHtml->getElementsByTagName("div")[5]->appendChild($itemHtml->createTextNode($item->username[0]));
    $itemHtml->getElementsByTagName("div")[6]->appendChild($itemHtml->createTextNode($item->description[0]));
    $xmlStr.= $itemHtml->saveHTML();
}
$view->setList($xmlStr);
$result = $controller->getApplyList($_SESSION["id"]);
$xmlStr = "";
foreach ($result->children() as $item){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/view/friendView/apply-info.html");
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/personal.php/personal/".$item->userId[0]);
    $itemHtml->getElementsByTagName("a")[1]->setAttribute("id",$item->userId[0]);
    $itemHtml->getElementsByTagName("a")[2]->setAttribute("id",$item->userId[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$item->face[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$item->username[0]);
    $itemHtml->getElementsByTagName("div")[3]->appendChild($itemHtml->createTextNode($item->username[0]));
    $itemHtml->getElementsByTagName("div")[4]->appendChild($itemHtml->createTextNode($item->description[0]));
    $xmlStr.= $itemHtml->saveHTML();
}
$view->setApplyList($xmlStr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 好友</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/friend.css">
    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<?php include "view/utilityView/banner.php" ?>
<div role="main">
    <div class="common-columns">
        <div class="content content-first friend-list common-column">
            <?php
            echo $view->getList();
            ?>
        </div>
        <div class="content content-first friend-apply common-column">
            <div class="apply-title">好友申请</div>
            <?php
            echo $view->getApplyList();
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".delete-friend").on("click", function(event){
        var id = $(event.target).attr("id");
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
    $(".accept-apply").on("click", function(event){
        var id = $(event.target).attr("id");
        $.ajax ({
            type:"POST",
            url: "/view/friendView/friend.php/accept",
            data: {
                id: id
            },
            success: function(data){
                if(data == 1){
                    location.reload();
                } else {
                    alert("同意申请失败！");
                }
            }
        });
    });$(".reject-apply").on("click", function(event){
        var id = $(event.target).attr("id");
        $.ajax ({
            type:"POST",
            url: "/view/friendView/friend.php/reject",
            data: {
                id: id
            },
            success: function(data){
                if(data == 1){
                    location.reload();
                } else {
                    alert("拒绝申请失败！");
                }
            }
        });
    });

</script>
</body>
</html>