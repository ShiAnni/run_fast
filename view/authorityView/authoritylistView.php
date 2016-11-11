<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:40
 */
class AuthorityListView extends View {
    private $list;

    function displayUserList($list){

    }

    function displayBannedList($list){

    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }
}