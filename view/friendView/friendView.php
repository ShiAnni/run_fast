<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/2
 * Time: 14:06
 */
require_once (dirname(__FILE__)."/../View.php");
class FriendView extends View {
    private $list;
    private $applyList;

    /**
     * @return mixed
     */
    public function getApplyList()
    {
        return $this->applyList;
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

    /**
     * @param mixed $applyList
     */
    public function setApplyList($applyList)
    {
        $this->applyList = $applyList;
    }

}