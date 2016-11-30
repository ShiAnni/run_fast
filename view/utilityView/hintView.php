<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:43
 */
require (dirname(__FILE__)."/../View.php");
class HintView extends View {
    private $content;
    private $confirmURL;
    function display($content, $confirmURL){
        $this->content = $content;
        $this->confirmURL = $confirmURL;
    }
}