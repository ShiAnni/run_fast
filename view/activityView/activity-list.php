<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/9
 * Time: 15:09
 */
require_once ("activitylistView.php");
$listView = new ActivityListView();
require_once (dirname(__FILE__)."/../../controller/activityController/activityController.php");
$controller = new ActivityController();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
if (count($arr) > 3){
    switch ($arr[3]){
        case "delete":
            $controller->delete($arr[4]);
            break;
    }
}
$xmlList = $controller->check();
$xmlStr = "";
foreach ($xmlList->children() as $item){
    $itemHtml = new DOMDocument();
    $itemHtml->loadHTMLFile(dirname(__FILE__)."/activity-list.html");
    $itemHtml->getElementsByTagName("a")[0]->setAttribute("href","/activity.php/activity/".$item->id[0]);
    $itemHtml->getElementsByTagName("h2")[0]->appendChild($itemHtml->createTextNode($item->name[0]));
    $itemHtml->getElementsByTagName("p")[0]->appendChild($itemHtml->createTextNode($item->description[0]));
    $itemHtml->getElementsByTagName("div")[5]->appendChild($itemHtml->createTextNode($item->startDate[0]."-".$item->endDate[0]));
    $itemHtml->getElementsByTagName("div")[8]->appendChild($itemHtml->createTextNode($item->location[0]));
    $itemHtml->getElementsByTagName("div")[11]->appendChild($itemHtml->createTextNode($item->participate[0]."/".$item->upper[0]));
    $itemHtml->getElementsByTagName("div")[14]->appendChild($itemHtml->createTextNode($item->limit[0]));

    if (!(($item->publisherId[0] == $_SESSION["id"])||($_SESSION["isManager"] == 1))){
        $itemHtml->getElementsByTagName("a")[1]->setAttribute("style","display:none");
    } else {
        $itemHtml->getElementsByTagName("a")[1]->setAttribute("href","/activity.php/activity/delete/".$item->id[0]);
    }
    if($item->publisherId[0] == $_SESSION["id"]){
        $itemHtml->getElementsByTagName("a")[2]->setAttribute("style","display:none");
    } else {
        $itemHtml->getElementsByTagName("a")[2]->setAttribute("href","/activity.php/activity/join/".$item->id[0]);
    }
    $xmlStr.= $itemHtml->saveHTML();
}
$listView->setList($xmlStr);
?>
<div class="activity-content common-column content-first">
    <div class="activity-list">
        <?php
        echo $listView->getList();
        ?>
    </div>
</div>
<script type="text/javascript" src="../../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

</script>
