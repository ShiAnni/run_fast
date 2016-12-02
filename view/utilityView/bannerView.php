<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/2
 * Time: 14:58
 */
require_once (dirname(__FILE__)."/../View.php");
class BannerView extends View {
    private static $banner;
    private $selected;
    private $face;
    private $name;
    private $id;
    private $isManager;

    private function __construct()
    {
        $this->id = $_SESSION["id"];
        $this->name = $_SESSION["name"];
        $this->face = $_SESSION["face"];
        $this->isManager = $_SESSION["isManager"];
    }

    static function getBanner(){
        if (is_null(BannerView::$banner)){
            BannerView::$banner = new BannerView();
        }
        return BannerView::$banner;
    }

    function selectedPage($selected){
        $this->selected = $selected;
    }

    /**
     * @return mixed
     */
    public function getSelected(){
        return $this->selected;
    }


    /**
     * @return mixed
     */
    public function getIsManager()
    {
        return $this->isManager;
    }
    /**
     * @return mixed
     */
    public function getFace()
    {
        return $this->face;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $selected
     */
    public function setSelected(string $selected)
    {
        $this->selected = $selected;
    }

    /**
     * @param mixed $face
     */
    public function setFace($face)
    {
        $this->face = $face;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

}