<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:37
 */
require_once (dirname(__FILE__)."/../View.php");
class AuthorityView extends View {
    private $content;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}