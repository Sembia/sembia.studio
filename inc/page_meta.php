<?php

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'page_meta_boxes_setup' );
add_action( 'load-post-new.php', 'page_meta_boxes_setup' );

/* Meta box setup function. */
function page_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'page_meta_boxes' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'save_page_meta', 10, 2 );
}

function page_meta_boxes(){
    add_meta_box( 'page_type_meta_box', 'Page Meta', 'render_page_type_box', 'page', 'side', 'high');
}

function render_page_type_box($object, $box){
    $color_options = array(
        'page-default' => 'Default',
        'page-blue' => 'Blue',
        'page-red' => 'Red',
        'page-yellow' => 'Yellow',
        'page-green' => 'Green',
    );
    $curr_color = get_post_meta($object->ID, 'color', true);
    if(empty($curr_color)) { $curr_color = 'page-default'; }

    ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'page_meta_nonce' ); ?>

    <p>
        <strong>Page Accent Color</strong>
        <br />
        <select name="page-color">
            <?php foreach($color_options as $key => $val){ ?>
                <option value="<?php echo $key; ?>" <?php if($key == $curr_color){ echo "selected"; }?>><?php echo $val; ?></option>
            <?php } ?>
        </select>
    </p>
<?php
}

/* Save the meta box's post metadata. */
function save_page_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['page_meta_nonce'] ) || !wp_verify_nonce( $_POST['page_meta_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;

    $color_meta = get_post_val('page-color');
    update_post_meta($post_id, 'color', $color_meta);
}
