<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:42
 */
require_once ("../View.php");
class ExerciseView extends View {
    private $data;
    private $statistics;
    private $walkNum;
    private $briskDis;
    private $briskVelocity;
    private $runDis;
    private $runVelocity;
    private $height;
    private $weight;
    private $water;
    function displayData($data){
        $this->data = $data;
    }

    function displayStatistics($statistics){
        $this->statistics = $statistics;
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
    public function getStatistics()
    {
        return $this->statistics;
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