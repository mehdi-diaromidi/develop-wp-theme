<div class="row" id="filter-content-results">
    <?php
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = [
        'post_type' => ['post'],
        'posts_per_page' => 3,
        'paged' => $page,
        'status' => 'publish'
    
    ];
    $the_query = new WP_Query($args);
    /* query_posts($args);*/
    /*echo '<pre>';
     var_dump($the_query);
     echo '</pre>';*/
    update_option('_dwt_post_num', $the_query->found_posts);
    if ($the_query->have_posts()):
        while ($the_query->have_posts()) : $the_query->the_post();
            if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat'))) {
                $cat = '<div class="topic_cat bg-warning text-white">' . get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat', true)) . '</div>';
            }else{
                echo '<div class="topic_cat bg-warning text-white">دسته بندی نشده</div>';
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
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid">
                    <div class="education_block_thumb position-relative">
                        <a href="<?php echo get_the_permalink() ?>"><?php echo dwt_post_thumbnail() ?></a>
                        <?php echo $cat ?>
                        <?php echo $type ?>
                    </div>
                    <div class="education_block_body">
                        <h4 class="bl-title"><a
                                    href="<?php echo get_the_permalink() ?>"> <?php echo get_the_title() ?></a></h4>
                        <p><?php echo PostExcerpt::dwt_excerpt_limit() ?></p>
                    </div>

                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a
                                        href="<?php echo get_the_permalink() ?>"><?php echo get_avatar(get_the_author_meta('user_email', get_the_author_ID()), 38) ?></a>
                            </div>
                            <h5><?php echo get_the_author_posts_link() ?></h5>
                        </div>
                        <span class="education_block_time ">
                            
                        <?php echo $level ?>
                    </span>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>


</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- Pagination -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <button id="load-more-archive" type="button" class="btn btn-loader" data-page-slug="post"> نمایش مطالب بیشتر<i class="fa fa-spin fa-spinner ml-3 load-more-loading"></i></button>
            </div>
        </div>
    </div>
</div>
<!--<div class="text-center theme-pagination ">
    <?php /*echo Pagination::paginate($the_query);
    */?>
</div>-->
