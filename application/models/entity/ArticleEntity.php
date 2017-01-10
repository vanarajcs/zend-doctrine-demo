<?php
class ArticleEntity
{
    private $id;

    private $headline;

    function getId() {
        return $this->id;
    }

    function getHeadline() {
        return $this->headline;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setHeadline($headline) {
        $this->headline = $headline;
    }


}
