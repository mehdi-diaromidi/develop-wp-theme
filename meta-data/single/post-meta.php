<div class="article_top_info">
    <ul class="article_middle_info">
        <li class="d-inline-flex"><span class="icons pr-2"><i class="ti-user"></i></span>
        <?php echo the_author_posts_link() ?>
        </li>
        <li><a href="#"><span class="icons"><i class="ti-comment-alt"></i></span><?php echo get_comments_number() ?> نظر ثبت شده</a></li>
        <li><span class="icons mr-2"><i class="ti-eye"></i></span><?php echo PostVeiw::dwt_get_post_view(get_the_ID())?> بازدید</li>
        <li><span class="icons mr-2"><i class="ti-timer"></i></span> دقیقه<?php echo ReadEstimateTime::dwt_read_estimate_time(get_the_content()) ?></li>
        <?php if(current_user_can('manage_options')): ?>
        <li><span class="icons mr-2"><i class="ti-search"></i></span> ورودی گوگل<?php echo GoogleReferer::dwt_get_google_referer(get_the_ID()) ?></li>
     <?php edit_post_link('ویرایش','<li><span class="icons mr-2"><i class="ti-edit"></i>','</span></li>','','d-inline') ?>
        <?php endif; ?>
       <?php
       $ls_settings = get_option('_like_post');
       if($ls_settings['_ls_position_type']=='static'){
           echo  '<li>'. do_shortcode('[like-post]').'</li>';
       }
       ?>
    </ul>
</div>
