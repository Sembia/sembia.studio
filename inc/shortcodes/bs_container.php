<?php
/**
 * Display a basic bootstrap container.
 * @param array $image
 */

?>

<div class="container">
    <?php if ($image) { ?>
    <img src="<?php echo $image[0] ?>" class="image-full sr-only" />
    <?php } ?>
    <?php echo wpb_js_remove_wpautop($content); ?>
</div>
