<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 11:05
 */
class Model {
    protected $view;
    function __construct($view){
        $this->view = $view;
    }
}