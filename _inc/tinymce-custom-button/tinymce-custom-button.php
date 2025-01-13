<?php
add_filter('mce_external_plugins','add_tinymce_plugin_js');
add_filter('mce_buttons','register_custom_button_for_tinymce');
 function add_tinymce_plugin_js($array){
     $array['video'] = get_template_directory_uri().'/assets/js/tinymce-buttons.js';
     $array['quote'] = get_template_directory_uri().'/assets/js/tinymce-buttons.js';
    return $array;
//     echo '<pre>';
//     var_dump($array);
//     echo '</pre>';

 }

 function register_custom_button_for_tinymce($buttons){
    array_push($buttons,'video','quote');
//  var_dump($buttons);
     return $buttons;
 }

 function format_tinymce($in){
    $in['toolbar1'] ='bold,hr,formatselect,italic,bullist,numlist,blockquote,alignleft,image,aligncenter,alignright,link,wp-more,spellchecker,wp_adv,dfw,video,quote';
    return $in;
 }
 add_filter('tiny_mce_before_init','format_tinymce');
