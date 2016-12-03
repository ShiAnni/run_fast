<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:42
 */
require_once (dirname(__FILE__)."/../View.php");
class ExerciseView extends View {
    private $walkNum;
    private $briskDis;
    private $briskVelocity;
    private $runDis;
    private $runVelocity;
    private $height;
    private $weight;
    private $water;

    function __construct()
    {
        $this->walkNum = 0;
        $this->briskDis = 0;
        $this->briskVelocity = 0;
        $this->runDis = 0;
        $this->runVelocity = 0;
        $this->height = 0;
        $this->weight = 0;
        $this->water = 0;
    }

    /**
     * @param $briskDis
     */
    public function setBriskDis($briskDis)
    {
        $this->briskDis = $briskDis;
    }

    /**
     * @param $briskVelocity
     */
    public function setBriskVelocity($briskVelocity)
    {
        $this->briskVelocity = $briskVelocity;
    }

    /**
     * @param $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @param  $runDis
     */
    public function setRunDis($runDis)
    {
        $this->runDis = $runDis;
    }

    /**
     * @param  $runVelocity
     */
    public function setRunVelocity( $runVelocity)
    {
        $this->runVelocity = $runVelocity;
    }

    /**
     * @param  $walkNum
     */
    public function setWalkNum( $walkNum)
    {
        $this->walkNum = $walkNum;
    }

    /**
     * @param  $water
     */
    public function setWater( $water)
    {
        $this->water = $water;
    }

    /**
     * @param  $weight
     */
    public function setWeight( $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getBriskDis()
    {
        return $this->briskDis;
    }

    /**
     * @return mixed
     */
    public function getBriskVelocity()
    {
        return $this->briskVelocity;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getRunDis()
    {
        return $this->runDis;
    }

    /**
     * @return mixed
     */
    public function getRunVelocity()
    {
        return $this->runVelocity;
    }

    /**
     * @return mixed
     */
    public function getWalkNum()
    {
        return $this->walkNum;
    }

    /**
     * @return mixed
     */
    public function getWater()
    {
        return $this->water;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

}