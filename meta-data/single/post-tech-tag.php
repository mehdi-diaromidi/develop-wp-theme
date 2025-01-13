<div class="post-tags">
    <h4 class="pbm-title">تگ ها این مطلب</h4>
    <ul class="list">
        <?php
        $post_tech_tags = get_the_terms($post->ID,'tech-tag');
/*   echo '<pre>';
        var_dump($post_tech_tags);
        echo '</pre>';*/

        if($post_tech_tags):
        foreach ($post_tech_tags as $tag):
            $tag_link = get_tag_link( $tag->term_id );
        ?>
        <li><a href="<?php echo $tag_link ?>"><?php echo $tag->name ?></a></li>

        <?php endforeach; ?>
        <?php else:?>
        <span class="alert alert-warning">تگی برای این مطلب وجود ندارد</span>
        <?php endif; ?>
    </ul>
</div>
