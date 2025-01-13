<!-- Tags Cloud -->
<div class="single_widgets widget_tags">
    <h4 class="title">تگ</h4>
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
