<?php

class GoogleReferer
{
    public static function dwt_set_google_referer(int $postID, $url):void{
        if(stripos($url,'https://www.google.com')) {
            $google_referer_key = '_google_referer_nums';
            $google_referer_nums = get_post_meta($postID, $google_referer_key, true);
            if (!metadata_exists('post', $postID, $google_referer_nums)) {
                add_post_meta($postID, $view_nums_key, '1');
            }
            $google_referer_nums++;
            update_post_meta($postID, $google_referer_key, $google_referer_nums);
        }
    }

    public static function dwt_get_google_referer(int $postID):string
    {
        $google_referer_key  = '_google_referer_nums';
        $google_referer_nums = get_post_meta($postID,$google_referer_key,true);
        if(!metadata_exists('post',$postID,$google_referer_key)){
            return "0";
        }
        return $google_referer_nums;
    }
}