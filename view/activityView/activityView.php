<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:15
 */
require_once ("../View.php");
class ActivityView extends View {
    private $content = "activity-list.php";

    function display($content){
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }
}