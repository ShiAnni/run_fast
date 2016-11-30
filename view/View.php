<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/31
 * Time: 20:00
 */
class View {
    function error($content, $confirmURL=""){
        require (dirname(__FILE__)."/utilityView/hintView.php");
        $hint = new HintView();
        $hint->display($content,$confirmURL);
    }

    function notified(){

    }
}