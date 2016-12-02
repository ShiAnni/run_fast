<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/1
 * Time: 14:45
 */
require_once (dirname(__FILE__)."/../View.php");
class IndexView extends View {
    private $news;
    private $announcements;
    private $activities;
    private $rank;

    /**
     * @return mixed
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @return mixed
     */
    public function getAnnouncements()
    {
        return $this->announcements;
    }

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param mixed $activities
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
    }

    /**
     * @param mixed $announcements
     */
    public function setAnnouncements($announcements)
    {
        $this->announcements = $announcements;
    }

    /**
     * @param mixed $news
     */
    public function setNews($news)
    {
        $this->news = $news;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

}