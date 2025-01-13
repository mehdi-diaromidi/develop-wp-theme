<?php
//DEFAULT IMAGE FOR POSTS
function dwt_default_post_thumbnail(): string
{
    $thumb_logo = get_template_directory_uri().'/assets/image/thumb-logo.jpg';
    return "<img class='img-responsive' src='$thumb_logo' alt='image'>";
}

//GET POST THUMBNAIL
function dwt_post_thumbnail(){

    if (has_post_thumbnail()) {
        return get_the_post_thumbnail('','', [
            'class' => 'img-responsive',
            'alt' => get_the_title()
        ]);

    } else {
        return dwt_default_post_thumbnail();
    }

}




