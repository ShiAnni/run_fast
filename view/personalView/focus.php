<?php
require_once (dirname(__FILE__)."/../../controller/personalController/focusController.php");
$controller = new FocusController();
$count = 0;
require_once (dirname(__FILE__)."/personalListView.php");
$listView = new PersonalListView();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$result = $controller->getFocusList($arr[3]);
$name = $result->attributes()["name"];
$id = $result->attributes()["id"];
$xmlStr = "";
foreach ($result->children() as $item){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/focus-info.html");
    if ($view->isSelf()){
        $itemHtml->getElementsByTagName("a")[2]->appendChild($itemHtml->createTextNode("取消关注"));
        if ($item->isFriend[0] == "1"){
            $itemHtml->getElementsByTagName("a")[2]->setAttribute("class","custom-btn plane-colored-btn btn-right btn-disabled");
        }  else {
            $itemHtml->getElementsByTagName("a")[2]->setAttribute("class","custom-btn plane-colored-btn btn-right un-focus");
            $itemHtml->getElementsByTagName("a")[2]->setAttribute("id",$item->userId[0]);
        }
    } else {
        $itemHtml->getElementsByTagName("a")[2]->setAttribute("display","none");
    }
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/personal.php/personal/".$item->userId[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("src",$item->face[0]);
    $itemHtml->getElementsByTagName("img")[0]->setAttribute("alt",$item->username[0]);
    $itemHtml->getElementsByTagName("a")[1]->setAttribute("href","/personal.php/personal/".$item->userId[0]);
    $itemHtml->getElementsByTagName("a")[1]->appendChild($itemHtml->createTextNode($item->username[0]));
    $itemHtml->getElementsByTagName("div")[3]->appendChild($itemHtml->createTextNode($item->description[0]));
    $xmlStr.= $itemHtml->saveHTML();
    $count++;
}
$listView->setList($xmlStr);
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="/assets/css/focus.css">

<div class="content focuses">
    <div class="focus-head">
        <a class="link-btn" href="/personal.php/personal/<?php echo $id?>"><?php echo $name?> </a>关注了<?php echo $count?>个人
        <a class="link-btn btn-right" href="/personal.php/personal/<?php echo $id?>">返回个人中心</a>
    </div>
    <div id="focus-list">
        <?php echo $listView->getList() ?>
    </div>
</div>
</html>
<script type="text/javascript" src="/view/personalView/fans.js">
</script>