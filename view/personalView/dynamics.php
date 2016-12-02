<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/29
 * Time: 17:45
 */
require_once (dirname(__FILE__)."/personalListView.php");
$listView = new PersonalListView();
require_once (dirname(__FILE__)."/../../controller/personalController/dynamicsController.php");
$controller = new DynamicsController();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$result = $controller->getDynamics($arr[3]);
$xmlStr = "";
foreach ($result->children() as $item){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/dynamic-info.html");
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/personal.php/personal/".$item->userId[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$item->face[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$item->username[0]);
    $itemHtml->getElementsByTagName("div")[3]->appendChild($itemHtml->createTextNode($item->username[0]));
    $itemHtml->getElementsByTagName("div")[4]->appendChild($itemHtml->createTextNode($item->time[0]));
    $itemHtml->getElementsByTagName("div")[5]->appendChild($itemHtml->createTextNode($item->content[0]));
    $xmlStr.= $itemHtml->saveHTML();
}
$listView->setList($xmlStr);
?>
<script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    function sendDynamic() {
        var content = $(".text-area").text();
        if (content == ""){
            alert("请输入动态内容！");
            return;
        }
        $.ajax({
            type:"POST",
            url: "/view/personalView/personal.php/send",
            data: {
                "content":content
            },
            success: function(data){
                if(data == 1){
                    refresh();
                } else {
                    alert("发送失败！");
                }
            }
        });
    }
    
    function refresh() {
        $.ajax({
            type:"POST",
            url: "/view/personalView/personal.php/refresh",
            success: function(data){
                $(".text-area").text("");
                $('#dynamics').html(data);
            }
        });
    }
</script>
<div style="<?php if ($view->isSelf()) echo "visibility: visible"; else echo "display: none"; ?>"class="dynamics-send content">
    <div class="text-area" contenteditable="true">

    </div>
    <a class="custom-btn send-btn colored-btn" onclick="sendDynamic()">发送动态</a>
</div>
<div class="dynamics content">
    <div style="<?php if ($view->isSelf()) echo "visibility: visible"; else echo "display: none"; ?>"class="dynamics-item">
        <a onclick="refresh()">
            <div class="refresh">刷新动态</div>
        </a>
    </div>
    <div id="dynamics">
        <?php
        echo $listView->getList();
        ?>
    </div>
</div>
