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

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}