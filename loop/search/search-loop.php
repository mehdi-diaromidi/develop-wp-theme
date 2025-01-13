<?php if(empty($_GET['s'])){
    wp_redirect(site_url());
} ?>
<div class="container">
    <!--   --><?php
    /*        global $wp_query;
            var_dump($wp_query);
            */?>
    <div class="mb-5" style="font-size: 16px"> تعداد مطلب مرتبط با کلید واژه  <span class="text-warning"><?php echo $_GET['s'] ?></span> <span class="badge badge-light"><?php echo $wp_query->found_posts; ?></span></div>
    <div class="row">
        <!-- Cource Grid 1 -->
        <?php if(have_posts()): ?>
        <?php while (have_posts()) : the_post();?>
        <div class="col-lg-4 col-md-6">
            <div class="education_block_grid">

                <div class="education_block_thumb">
                    <a href="course-detail.html"><?php echo dwt_post_thumbnail() ?></a>
                    <?php if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat'))) : ?>
                        <div class="topic_cat bg-warning text-white"><?php echo get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat',true)) ?></div>
                    <?php endif; ?>
                </div>
                <div class="education_block_body">
                    <h4 class="bl-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a></h4>
                    <p><?php echo PostExcerpt::dwt_excerpt_limit();?></p>
                </div>

                <div class="education_block_footer">
                    <div class="education_block_author">
                        <div class="path-img"><a href="<?php the_permalink(); ?>"><?php echo get_avatar(get_the_author_meta('user_email',get_the_author_ID()),38) ?></a></div>
                        <h5><a href="<?php the_permalink(); ?>"><?php echo get_the_author() ?></a></h5>
                    </div>
                    <span class="education_block_time ">
                        <?php
                        if (!empty(get_post_meta(get_the_ID(), '_dwt_post_level'))) {
                            switch (get_post_meta(get_the_ID(), '_dwt_post_level', true)) {
                                case 1:
                                    echo 'سطح : مقدماتی';
                                    break;
                                case 2:
                                    echo 'سطح : متوسط';
                                    break;
                                case 3:
                                    echo 'سطح : پیشرفته';
                            }
                        } ?>
                    </span>
                </div>
            </div>
        </div>
<?php endwhile; ?>
        <?php else: ?>
        <div class="alert alert-info" style="width: 100%">کاربر گرامی : نتیجه ای برای جستجوی کلید واژه <span class="text-warning"><?php echo $_GET['s']?></span> یافت نشد! </div>
            <div class="single_widgets widget_tags" style="width: 100%;border: none">
                <h4 class="title my-5">تگ های پربازدید</h4>
                <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
                    <ul>
                        <?php $tag_clouds = wp_tag_cloud( 'smallest=8&largest=14&format=array&unit = px&show_count=1' );
                        foreach ($tag_clouds as $tag) echo '<li>'.$tag.'</li>';
                        ?>
                    </ul>
                <?php else: ?>
                    <div class="alert alert-warning">تگی پیدا نشد!!!</div>
                <?php endif;?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

    </div>
    <div class="text-center theme-pagination "><?php the_posts_pagination(); ?></div>
</div>
