<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/28
 * Time: 0:14
 */
require_once (dirname(__FILE__)."/../Model.php");
class AuthorityModel extends Model {
    function __construct() {
        parent::__construct();
    }

    function getUserList($keyword){
        if ($keyword ==""){
            $result = $this->dataAccess->executeSelect("SELECT id,username,face,isManager FROM user");
        } else {
            $result = $this->dataAccess->executeSelect("SELECT id,username,face,isManager FROM user WHERE username LIKE '%".$keyword."%'");
        }
        $xml = new DOMDocument();
        $xml->loadXML("<users></users>");
        while ($row = $result->fetchArray()){
            $element = new DOMDocument();
            $element->load(dirname(__FILE__)."/../../data/userAuthority.xml");
            $element->getElementsByTagName("userId")[0]->appendChild($element->createTextNode($row["id"]));
            $element->getElementsByTagName("face")[0]->appendChild($element->createTextNode($row["face"]));
            $element->getElementsByTagName("username")[0]->appendChild($element->createTextNode($row["username"]));
            $element->getElementsByTagName("isManager")[0]->appendChild($element->createTextNode($row["isManager"]));
            $xml->getElementsByTagName("users")[0]->appendChild($xml->importNode($element->getElementsByTagName("userAuthority")[0],true));
        }
        return simplexml_import_dom($xml);
    }

    function setIsManager($userId, $isManager){
        return $this->dataAccess->executeInUpDe("UPDATE user SET isManager=".$isManager." WHERE id=".$userId);
    }
}