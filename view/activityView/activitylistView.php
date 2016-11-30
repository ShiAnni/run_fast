<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:33
 */
require_once (dirname(__FILE__)."/../View.php");
class ActivityListView extends View {
    private $list;
    function display($list){
        foreach ($list->children() as $child){

        }
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param mixed $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }
}