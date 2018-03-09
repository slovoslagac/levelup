<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 26.2.2018
 * Time: 15:33
 */
class participant_details
{
    public $tournamentid;
    public $participantid;
    public $roundid;
    public $groupid;
    public $special_data;

    function setObjectAttribute($attr, $value)
    {
        $this->$attr = $value;
    }


}

