<?php
require_once ("authorityView.php");
$view = new AuthorityView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - 权限管理</title>
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/authority.css">
</head>
<body>
<?php include "../utilityView/banner.php" ?>
<div role="main">
    <?php include "user-list.php"; ?>
</div>
</body>
</html>