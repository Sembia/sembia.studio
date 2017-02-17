<?php
/**
 * load the Visual Composer Components
 */
add_action('vc_before_init', function() {
    require 'components/content.php';
    require 'components/images.php';
}); ?>
