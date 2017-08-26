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

    $background_options = array(
        'image-default' => 'Default',
        'image-fixed' => 'Fixed',
    );

    $fullpage_options = array(
        'fullpage' => 'Default (Fullpage)',
        'fullpageSingle' => 'Single Fullpage',
        'fullpageNone' => 'Disabled',
    );

    $curr_background_settings = get_post_meta($object->ID, 'image-background', true);
    if(empty($curr_background_settings)) { $curr_background_settings = 'image-default'; }

    $curr_fullpage = get_post_meta($object->ID, 'fullpage', true);
    if(empty($curr_fullpage)) { $curr_fullpage = 'fullpage'; }

    $curr_color = get_post_meta($object->ID, 'color', true);
    if(empty($curr_color)) { $curr_color = 'page-default'; }

    $fullwidth_options = array(
        'container' => 'No',
        'container-fluid' => 'Yes',
    );
    $curr_fullwidth = get_post_meta($object->ID, 'fullwidth', true);
    if(empty($curr_fullwidth)) { $curr_fullwidth = 'container'; }
    $curr_parent = get_post_meta($object->ID, 'fullpage-parent', true);
    $curr_order = get_post_meta($object->ID, 'fullpage-order', true);
    if(empty($curr_order)) { $curr_order = 0; }
    $pages = get_pages();
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

    <p>
        <strong>Fullpage Parent</strong>
        <br />
        <select name="fullpage-parent">
            <option value="0">(none)</option>
            <?php foreach($pages as $page){ ?>
            <option value="<?php echo $page->ID; ?>" <?php if($page->ID == $curr_parent){ echo "selected"; }?>><?php echo $page->post_title; ?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <strong>Section Order</strong>
        <br />
        <input type="number" size="4" name="fullpage-order" value="<?php echo $curr_order; ?>" />
    </p>
    <p>
        <strong>Fullwidth Section?</strong>
        <br/>
        <select name="fullwidth">
            <?php foreach($fullwidth_options as $key => $val){ ?>
                <option value="<?php echo $key; ?>" <?php if($key == $curr_fullwidth){ echo "selected"; }?>><?php echo $val; ?></option>
            <?php } ?>
        </select>
    </p>

    <p>
        <strong>Background Image Settings</strong>
        <br/>
        <select name="image-background-settings">
            <?php foreach($background_options as $key => $val){ ?>
                <option value="<?php echo $key; ?>" <?php if($key == $curr_background_settings){ echo "selected"; }?>><?php echo $val; ?></option>
            <?php } ?>
        </select>
    </p>

    <p>
        <strong>Fullpage.js Settings</strong>
        <br/>
        <select name="fullpage">
            <?php foreach($fullpage_options as $key => $val){ ?>
                <option value="<?php echo $key; ?>" <?php if($key == $curr_fullpage){ echo "selected"; }?>><?php echo $val; ?></option>
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

    $image_background_meta = get_post_val('image-background-settings');
    update_post_meta($post_id, 'image-background', $image_background_meta);

    $fullpage_parent = get_post_val('fullpage-parent', 0);
    update_post_meta($post_id, 'fullpage-parent', $fullpage_parent);

    $section_order = get_post_val('fullpage-order', 0);
    update_post_meta($post_id, 'fullpage-order', $section_order);

    $fullwidth = get_post_val('fullwidth');
    update_post_meta($post_id, 'fullwidth', $fullwidth);

    $fullpage = get_post_val('fullpage');
    update_post_meta($post_id, 'fullpage', $fullpage);
}
