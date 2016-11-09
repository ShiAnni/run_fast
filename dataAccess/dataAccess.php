<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 22:07
 */
class DataAccess {
    static private $dataAccess = null;
    private $db;

    private function __construct(){
        $this->db = sqlite_open("../runfast.db");
    }

    function __destruct(){
        sqlite_close($this->db);
    }

    static function getDataAccess(){
        if (is_null(self::$dataAccess)){
            self::$dataAccess = new DataAccess();
        }
        return self::$dataAccess;
    }

    function executeSQL($sql){
        $result = sqlite_query($this->db, $sql);
        return $result;
    }
}