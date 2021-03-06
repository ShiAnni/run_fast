<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 15:06
 */
require_once (dirname(__FILE__)."/../View.php");
class PersonalView extends View {
    private $content;
    private $info;
    private $name;
    private $level;
    private $experience;
    private $description;
    private $gender;
    private $location;
    private $birthday;
    private $fans;
    private $focus;
    private $friend;
    private $face;
    private $id;
    private $width;
    private $visible;
    private $focused;
    private $isFriend;


    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }
    /**
     * @return mixed
     */
    public function getFocused()
    {
        return $this->focused;
    }

    /**
     * @param mixed $focused
     */
    public function setFocused($focused)
    {
        $this->focused = $focused;
    }

    /**
     * @return mixed
     */
    public function getIsFriend()
    {
        return $this->isFriend;
    }

    /**
     * @param mixed $isFriend
     */
    public function setIsFriend($isFriend)
    {
        $this->isFriend = $isFriend;
    }

    /**
     * @return mixed
     */
    public function isSelf()
    {
        return $this->visible;
    }

    /**
     * @param mixed $isSelf
     */
    public function setIsSelf($isSelf)
    {
        $this->visible = $isSelf;
    }


    function __construct()
    {
        $this->content = "view/personalView/dynamics.php";
        $this->info = "view/personalView/personal-info.php";
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @param mixed $face
     */
    public function setFace($face)
    {
        $this->face = $face;
    }

    /**
     * @param mixed $fans
     */
    public function setFans($fans)
    {
        $this->fans = $fans;
    }

    /**
     * @param mixed $focus
     */
    public function setFocus($focus)
    {
        $this->focus = $focus;
    }

    /**
     * @param mixed $friend
     */
    public function setFriend($friend)
    {
        $this->friend = $friend;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}