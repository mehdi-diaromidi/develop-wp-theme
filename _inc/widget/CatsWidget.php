<?php

class CatsWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(false, 'دسته بندی مطالب');
    }

    function widget($args, $instance)
    {
        echo $args['before_widget'];
        /*        echo $args['before_title'];
                echo 'دسته بندی ها';
                echo '<pre>';
                var_dump($instance['title']);
                echo '</pre>';*/
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        } else {
            echo 'برای ویجت خود عنوان انتخاب کنید!';
        }
        echo $args['after_title'];
//        echo 'اولین ویجت من!';
        $args = [
            'title_li' => '',
            'depth'=>1,
            'show_count' => true,
            'orderby' => 'name',
            'order' => 'DESC',
            'echo'=>false
//           'exclude'  => array( 20 ),
        ];
        $variable = wp_list_categories($args);
        $variable  = preg_replace( '~\((\d+)\)(?=\s*+<)~', '<span class="cat-count">$1</span>',  $variable );
        echo $variable;
        echo $args['after_widget'];
    }


    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'عنوان پیشفرض ( برای ویجت خود یک عنوان انتخاب نمایید! )';
//$pass = ! empty( $instance['pass'] ) ? $instance['pass'] : '';

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان ویجت</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
            <!--  <label for="<?php /*echo esc_attr( $this->get_field_id( 'pass' ) ); */ ?>">کلمه عبور</label>
            <input class="widefat" id="<?php /*echo esc_attr( $this->get_field_id( 'pass' ) ); */ ?>" name="<?php /*echo esc_attr( $this->get_field_name( 'pass' ) ); */ ?>" type="text" value="<?php /*echo esc_attr( $pass ); */ ?>" placeholder="کلمه عبور وارد نمایید...">-->
        </p>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['pass'] = (!empty($new_instance['pass'])) ? sanitize_text_field($new_instance['pass']) : '';

        return $instance;
    }
}

function dwt_register_widget()
{
    register_widget('CatsWidget');
}

add_action('widgets_init', 'dwt_register_widget');