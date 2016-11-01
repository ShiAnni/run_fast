<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:43
 */
require_once ("../View.php");
class HintView extends View {
    var $content;
    function display($content){
        $this->content = $content;
    }
}