<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 15:06
 */
require_once ("../View.php");
class PersonalView extends View {
    private $content;
    private $personalInfo;
    private $infoRight;
    private $name;
    private $level;
    private $experience;
    private $description;
    private $gender;
    private $location;
    private $birthday;
    private $fans;
    private $focus;
    private $message;
    private $friend;
    private $face;

    function displayContent($content){
        $this->content = $content;
    }

    function displayOthersInfoRight($infoRight){

    }

    function displayPersonalInfo($personalInfo){

    }

    function displayInfoRight($infoRight){

    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @return mixed
     */
    public function getFans()
    {
        return $this->fans;
    }

    /**
     * @return mixed
     */
    public function getFocus()
    {
        return $this->focus;
    }

    /**
     * @return mixed
     */
    public function getFriend()
    {
        return $this->friend;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFace()
    {
        return $this->face;
    }
}