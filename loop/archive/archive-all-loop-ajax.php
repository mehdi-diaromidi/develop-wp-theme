<?php
add_action('wp_ajax_dwt_more_content', 'dwt_more_content');
add_action('wp_ajax_nopriv_dwt_more_content', 'dwt_more_content');
function dwt_more_content(){
    if(!isset($_POST['nonce']) && !wp_verify_nonce($_POST['nonce'])){
        die('access denied');
    }
        $args = [
            'post_type' => $_POST['page_slug'],
            'posts_per_page' => 3,
            'paged' => $_POST['paged'],
            'status' => 'publish'
            ];
    $the_query = new WP_Query($args);
    /*      echo '<pre>';
           var_dump($the_query);
           echo '</pre>';*/
    if ($the_query->have_posts()):
        $html_output = '';
        while ($the_query->have_posts()) : $the_query->the_post();
            if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat'))) {
                $cat = '<div class="topic_cat bg-warning text-white">' . get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat', true)) . '</div>';
            }
            
            if (!empty(get_post_meta(get_the_ID(), '_dwt_post_level'))) {
                switch (get_post_meta(get_the_ID(), '_dwt_post_level', true)) {
                    case 1:
                        $level = 'سطح : مقدماتی';
                        break;
                    case 2:
                        $level = 'سطح : متوسط';
                        break;
                    case 3:
                        $level = 'سطح : پیشرفته';
                }
            }
            if (!empty(get_post_meta(get_the_ID(), '_dwt_post_types'))) {
                switch (get_post_meta(get_the_ID(), '_dwt_post_types', true)) {
                    case 1:
                        $type = '<span class="post-type-icon position-absolute"><i class="fas fa-file-alt"></i></span>';
                        break;
                    case 2:
                        $type = '<span class="post-type-icon position-absolute"><i class="fas fa-play-circle"></i></span>';
                        break;
                }
            }
            ?><?php
            $html_output .= '
           <div class="col-lg-4 col-md-6">
                    <div class="education_block_grid">
                        <div class="education_block_thumb position-relative">
                            <a href="' . get_the_permalink() . '">' . dwt_post_thumbnail() . '</a>
                          ' . $cat . '
                          '. $type  .'
                        </div>
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
                            <p>' . PostExcerpt::dwt_excerpt_limit() . '</p>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="' . get_the_permalink() . '">' . get_avatar(get_the_author_meta('user_email', get_the_author_ID()), 38) . '</a></div>
                                <h5>' . get_the_author_posts_link() . '</h5>
                            </div>
                            <span class="education_block_time ">
                            
                        ' . $level . '
                    </span>
                        </div>
                    </div>
                </div>
        ';
        endwhile;
    endif;
    wp_reset_postdata();
    wp_send_json([
        'content' => $html_output,
        'success' => true,
        'max_page' =>$the_query->max_num_pages,
      
    ], 200);
    
}
