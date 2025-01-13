<?php

class Pagination
{
    public static function paginate(object $query,string $type ='plain'):string
    {
        $big = 999999999;
        $args = [
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current'=>max(1,get_query_var('paged')),
            'total'=> $query->max_num_pages,
            'type'=>$type
        ];
        return paginate_links($args);
    }
}