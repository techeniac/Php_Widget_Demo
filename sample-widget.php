<?php
/**
 * Create a sample Widget
 */


class TechWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('sample_text', 'Sample Widget', array(
            'classname' => 'sample_text_box',
            'description' => 'This is a sample text box widget'
        ));
    }

    public function widget($args, $instance)
    {
        $title = $instance['title'];
        $tagline = $instance['tagline'];
        $desc = $instance['description'];
        echo $args['before_widget'].$args['before_title'].$title.$args['after_title']; ?>
        <p><label for="">Title: </label><?php echo $title; ?></p>
        <p><label for="">Tagline: </label><?php echo $tagline; ?></p>
        <p><label for="">Description: </label><?php echo $desc; ?></p>
        <?php
        echo $args['after_widget'];
    }


    public function form($instance)
    {
        $title = ($instance['title'])?$instance['title']:'';
        $tagline = ($instance['tagline'])?$instance['tagline']:'';
        $desc = ($instance['description'])?$instance['description']:''; ?>
        <p>
        <label for="<?php echo $this->get_field_id('title') ?>">Title:</label>
        <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')) ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('tagline') ?>">Tagline:</label>
        <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('tagline')) ?>" id="<?php echo esc_attr($this->get_field_id('tagline')); ?>" value="<?php echo $tagline; ?>">
        </p>
          <p>
        <label for="<?php echo $this->get_field_id('description') ?>">Description:</label>
        <textarea class="widefat" name="<?php echo esc_attr($this->get_field_name('description')) ?>" id="<?php echo esc_attr($this->get_field_id('description')); ?>"  cols="30" rows="10"><?php echo $desc; ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance[ 'title' ]);
        $instance['tagline'] = strip_tags($new_instance[ 'tagline' ]);
        $instance['description'] = strip_tags($new_instance[ 'description' ]);
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('TechWidget');
});

?>
