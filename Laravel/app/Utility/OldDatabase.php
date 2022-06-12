<?php

namespace Tests\TestApplications\Laravel\app\Utility;

class OldDatabase
{
    public static function access($param)
    {
        $result = mysql_query($param);
        return $result;
    }

}
