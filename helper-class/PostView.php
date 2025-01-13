<?php

class PostVeiw
{
    public static function dwt_set_post_view(int $postID):void{
        $view_nums_key  = '_post_view_nums';
        $post_view = get_post_meta($postID,$view_nums_key,true);
        if(!metadata_exists('post',$postID,$view_nums_key)){
            add_post_meta($postID,$view_nums_key ,'1');
        }
            $post_view++;
            update_post_meta($postID,$view_nums_key,$post_view);

    }

    public static function dwt_get_post_view(int $postID):string
    {
        $view_nums_key  = '_post_view_nums';
        $get_post_view_nums = get_post_meta($postID,$view_nums_key,true);
        if(!metadata_exists('post',$postID,$view_nums_key)){
            return "0";
        }
        return $get_post_view_nums;
    }
}