<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/12/1
 * Time: 21:13
 */
session_start();
if (is_null($_SESSION["id"])){
    header("Location: /login.php");
    exit();
}
require_once (dirname(__FILE__)."/../utilityView/bannerView.php");