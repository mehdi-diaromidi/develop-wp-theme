<!-- ============================ Instructor Detail ================================== -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="custom-tab customize-tab tabs_creative">
                    <ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">مطالب نویسنده</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">درباره نویسنده</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">نظرات</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <!-- Classess -->
                        <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">

                                <!-- Single Video -->

                                <?php if (have_posts()): ?>
                                    <?php while (have_posts()) : the_post(); ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="edu-watching">
                                                <div class="property_video sm">
                                                    <div class="thumb">
                                                        <a href="<?php the_permalink(); ?>"><?php echo dwt_post_thumbnail() ?></a>
                                                        <!-- <div class="overlay_icon">
                                                             <div class="bb-video-box">
                                                                 <div class="bb-video-box-inner">
                                                                     <div class="bb-video-box-innerup">
                                                                         <a href="https://www.aparat.com/video/video/embed/videohash/cNpW0/vt/frame"
                                                                            data-toggle="modal"
                                                                            data-target="#popup-video"
                                                                            class="theme-cl"><i
                                                                                     class="ti-control-play"></i></a>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>-->
                                                    </div>
                                                    <!-- <div class="edu_duration">25:10</div>-->
                                                </div>
                                                <div class="edu_video detail">
                                                    <div class="edu_video_header">
                                                        <h4>
                                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="edu_video_bottom">
                                                        <div class="edu_video_bottom_left">
                                                            <span><?php echo get_the_author() ?></span>
                                                        </div>
                                                        <div class="edu_video_bottom_right">
                                                            <i class="ti-desktop"></i>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="text-center theme-pagination "><?php the_posts_pagination(); ?></div>
                        </div>

                        <!-- Education -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="details_single p-2">
                               <!-- <div class="alert alert-info">-->
                                    <!--  --><?php /*echo get_the_author_meta('user_description', get_query_var('author'));  */ ?>
                                    <?php $author_resume = get_the_author_meta('user_description', get_query_var('author'));
                                    $author_resume_divide = explode('---', $author_resume);
                                    /*var_dump($author_resume);*/
                                    ?>
                                <?php if($author_resume): ?>
                                    <ul class="skills_info">
                                        <?php foreach ($author_resume_divide as $resume):
                                            $author_resume_details = explode('|',$resume);
                                        /*var_dump($author_resume_details);*/
                                            ?>
                                            <li>
                                                <div class="skills_captions">
                                                    <h4 class="Skill_title"><?php echo $author_resume_details[0]?></h4>
                                                    <span><?php echo $author_resume_details[1]?></span>
                                                    <span><?php echo $author_resume_details[2]?></span>
                                                    <p class="skills_dec"><?php echo $author_resume_details[3]?></p>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                <div class="alert alert-warning">رزومه نویسنده نویسنده در دسترس نمی باشد.</div>
                                <?php endif; ?>
                            </div>
                                </div>
                          <!--  </div>-->

                            <!-- Reviews -->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="reviews-comments-wrap">
                                    <!-- reviews-comments-item -->
                                    <?php
                                    $args = [
                                        'status' => 'approve',
                                        'post_author' => get_the_author_meta('ID'),
                                        /*'author__in'=>true,*/
                                        'author__not_in' => get_the_author_meta('ID')

                                    ];
                                    $the_comments = new WP_Comment_Query();
                                    $the_comments = $the_comments->query($args);
                                    /*   echo '<pre>';
                                         var_dump($the_comments);
                                         echo '</pre>';*/
                                    ?>

                                    <?php foreach ($the_comments as $the_comment): ?>
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <?php echo get_avatar($the_comment->comment_author_email, 80, '', $the_comment->comment_author, ['class' => 'img-fluid']) ?>
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4 class="my-2"><a
                                                            href="<?php echo get_comment_link($the_comment->comment_ID) ?>"><?php echo get_the_title($the_comment->comment_post_ID) ?></a>
                                                </h4>
                                                <h4><?php echo $the_comment->comment_author ?><span
                                                            class="reviews-comments-item-date"><i
                                                                class="ti-calendar theme-cl"></i><?php echo get_comment_date('j F Y', $the_comment->comment_ID) ?></span>
                                                </h4>

                                                <div class="clearfix"></div>
                                                <p><?php echo $the_comment->comment_content ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <!--reviews-comments-item end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- ============================ Instructor Detail ================================== -->
