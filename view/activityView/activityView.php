<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:15
 */
require (dirname(__FILE__)."/../View.php");
class ActivityView extends View {
    private $tag = "activity-list";
    private $content = "view/activityView/activity-list.php";

    function display($content){
        $this->tag = $content;
        if ($content === "activity-list"){
            $this->content = "view/activityView/activity-list.php";
        } else if($content === "activity-publish"){
            $this->content = "view/activityView/activity-publish.php";
        }
    }

    public function getContent() {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @param string $tag
     */
    public function setTag(string $tag)
    {
        $this->tag = $tag;
    }
}