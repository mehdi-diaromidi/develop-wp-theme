<!-- Searchbard -->
<div class="single_widgets widget_search">
    <h4 class="title mb-3">آرشیو مطالب</h4>
    <select name="archive-dropdown" class="form-control form-control-sm bg-light text-dark" onchange="document.location.href=this.options[this.selectedIndex].value;">
        <option value="">آرشیو مطالب بر اساس ...</option>
        <?php
        $args=[
            'format'          => 'option',
            'show_post_count' => true,
            'post_type'       => 'post',
            /*'type'            => 'daily',*/
        ];
        wp_get_archives($args);
        ?>
    </select>
</div>

