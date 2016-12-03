<?php
/**
 * Created by PhpStorm.
 * User: WillLester
 * Date: 2016/11/11
 * Time: 11:19
 */
require_once (dirname(__FILE__)."/authoritylistView.php");
$listView = new AuthorityListView();
require_once (dirname(__FILE__)."/../../controller/authorityController/authorityController.php");
$controller = new AuthorityController();
$result = $controller->getUserList();
$xmlStr = "";
foreach ($result->children() as $item){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/authority-info.html");
    $itemHtml->getElementsByTagName("div")[1]->appendChild($itemHtml->createTextNode($item->username[0]));
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$item->face[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$item->username[0]);
    if ($item->isManager == "1"){
        $itemHtml->getElementsByTagName("a")[0]->appendChild($itemHtml->createTextNode("解除管理员"));
        if ($item->userId[0] == $_SESSION["id"]){
            $itemHtml->getElementsByTagName("a")[0]->setAttribute("class","user-btn custom-btn plane-colored-btn btn-disabled");
        } else {
            $itemHtml->getElementsByTagName("a")[0]->setAttribute("class","user-btn custom-btn plane-colored-btn release-manager");
        }
    } else {
        $itemHtml->getElementsByTagName("a")[0]->appendChild($itemHtml->createTextNode("设为管理员"));
        $itemHtml->getElementsByTagName("a")[0]->setAttribute("class","user-btn custom-btn plane-colored-btn set-manager");
    }
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("id",$item->userId[0]);
    $xmlStr.= $itemHtml->saveHTML();
}
$listView->setList($xmlStr);
?>
<div class="content content-first user-list">
    <div class="user-item user-search common-columns">
        <input type="text" class="form-control common-column search-text" id="search-text" placeholder="搜索用户">
        <a class="custom-btn colored-btn common-column search-btn">搜索</a>
    </div>
    <div id="users">
        <?php
        echo $listView->getList();
        ?>
    </div>
</div>
<script type="text/javascript">
    $(".search-btn").on("click", function(event){
        var keyword = $("#search-text").val();
        $.ajax ({
            type:"POST",
            url: "/view/authorityView/authority.php/search",
            data: {
                keyword: keyword
            },
            success: function(data){
                $("#users").html(data);
            }
        });
    });
    $(".set-manager").on("click", function(event){
        var id = $(event.target).attr("id");
        $.ajax ({
            type:"POST",
            url: "/view/authorityView/authority.php/set-manager",
            data: {
                id: id
            },
            success: function(data){
                if(data == 1){
                    location.reload();
                } else {
                    alert("设置失败！");
                }
            }
        });
    });
    $(".release-manager").on("click", function(event){
        var id = $(event.target).attr("id");
        $.ajax ({
            type:"POST",
            url: "/view/authorityView/authority.php/release-manager",
            data: {
                id: id
            },
            success: function(data){
                if(data == 1){
                    location.reload();
                } else {
                    alert("解除失败！");
                }
            }
        });
    });
</script>
