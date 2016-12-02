<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:40
 */
class AuthorityListView extends View {
    private $list;

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