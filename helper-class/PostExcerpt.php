<?php

class PostExcerpt
{
    public static function dwt_excerpt_limit(): string
    {
        $excerpt = get_the_excerpt();
        return mb_substr($excerpt, 0, 100) . ' ' . '...';
    }
}