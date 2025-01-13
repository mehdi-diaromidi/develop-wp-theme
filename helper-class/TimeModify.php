<?php

class TimeModify
{
    public static function time_ago(string $time)
    {
        $timestamp = strtotime($time);
//    echo $timestamp;
        $diff = time() - $timestamp;
        if ($diff < 60) {
            return 'چند لحظه پیش';
            exit;
        }
        $time_rules = [
            60 * 60 * 24 * 30 * 12 => 'سال',
            60 * 60 * 24 * 30 => 'ماه',
            60 * 60 * 24 => 'روز',
            60 * 60 => 'ساعت',
            60 => 'دقیقه',
        ];
        foreach ($time_rules as $key => $value){
            $final_time  = round($diff / $key);
//           echo $final_time;
            if($final_time >=1){
                return  $final_time .' ' . $value .' '. 'پیش';
            }
        }
    }

}