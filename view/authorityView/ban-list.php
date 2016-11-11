<?php
/**
 * Created by PhpStorm.
 * User: WillLester
 * Date: 2016/11/11
 * Time: 11:15
 */
require_once ("authoritylistView.php");
$listView = new AuthorityListView();
?>
<?php echo $listView->getList() ?>

