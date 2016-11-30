<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 22:07
 */
class DataAccess {
    static private $dataAccess = null;
    private $sqlite;

    private function __construct(){
        $this->sqlite = new SQLite3(dirname(__FILE__)."/../runfast.db");
    }

    function __destruct(){
        $this->sqlite->close();
    }

    static function getDataAccess(){
        if (is_null(self::$dataAccess)){
            self::$dataAccess = new DataAccess();
        }
        return self::$dataAccess;
    }

    function executeSQL($sql){
        $result = $this->sqlite->query($sql);
        return $result;
    }
}