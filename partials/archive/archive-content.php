<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- Row -->
        <div class="row align-items-center mb-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex align-items-baseline">
                    <?php
                    if(is_page('technology')){
                        echo '<div class="mb-5 find-post-num-title" style="font-size: 16px">کل مطالب اخبار تکنولوژی : </div>
                        <span class="badge badge-light find-post-num">'. get_option('_dwt_tech_post_num').'</span>';
                    }elseif (is_page('post')){
                     echo '<div class="mb-5 find-post-num-title" style="font-size: 16px">کل مطالب آموزشی : </div>
                        <span class="badge badge-light find-post-num">'. get_option('_dwt_post_num').'</span>';
                    }
                    else{
                        echo ' <div class="mb-5 find-post-num-title" style="font-size: 16px"> تعداد مطالب بایگانی شده : </div>
                    <span class="badge badge-light find-post-num">'.$wp_query->found_posts.'</span>';
                    }
                    ?>
                    
     <!--              <span>
                            --><?php /*$count_posts = wp_count_posts('tech')->publish;
                            echo $count_posts ? $count_posts : '0';*/
                        /*    if($count_posts){
                                echo $count_posts;
                            }
                            else{
                                echo '0';
                            }*/
                            ?>
                      <!--  </span>-->
             
             
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 ordering">
                <div class="filter_wraps">
                    <div class="dl">
                        <div id="main2">
                            <a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2"><span><i class="fas fa-arrow-alt-circle-right"></i></span>باکس فیلتر</a>
                        </div>
                    </div>
                  <!--  <div class="dropdown show">
                        <a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            دوره های آموزشی
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">پرمخاطب</a>
                            <a class="dropdown-item" href="#">جدید</a>
                            <a class="dropdown-item" href="#">ویژه</a>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- /Row -->

        <!--<div class="row">-->
<?php if(is_page('technology')){
    get_template_part('loop/archive/archive-all-tech-loop','archive-all-tech-loop');
}elseif (is_page('post')){
    get_template_part('loop/archive/archive-all-post-loop','archive-all-post-loop');
}else{
    get_template_part('loop/archive/archive-loop','archive-loop');
} ?>


       <!-- </div>-->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <button id="load-more" type="button" class="btn btn-loader"> نمایش مطالب بیشتر<i class="fa fa-spin fa-spinner ml-3 load-more-loading"></i></button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Row -->

    </div>

</div>
<!-- Row -->
</div>
</section>
