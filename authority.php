<?php
include_once (dirname(__FILE__)."/view/utilityView/prevent.php");
if ($_SESSION["isManager"] == 0){
    header("Location: /index.php");
    exit();
}
BannerView::getBanner()->setSelected("authority.php");
require_once(dirname(__FILE__)."/view/authorityView/authorityView.php");
$view = new AuthorityView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 权限管理</title>
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/authority.css">
</head>
<body>
<?php include "view/utilityView/banner.php" ?>
<div role="main">
    <?php include "view/authorityView/user-list.php"; ?>
</div>
</body>
</html>