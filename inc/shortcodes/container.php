<?php
/**
 * Display a container with optional background.
 *
 * @param array $image
 * @param string $color
 */

if ($image) {
    $classes = 'block-container-offset';
} else {
    $classes = '';
}

?>

<div class="<?php echo $color; ?>-block-container block-container <?php echo $classes ?>">
    <?php if ($image) { ?>
        <div class="image-primary">
            <img src="<?php echo $image[0] ?>" class="image-full sr-only" />
        </div>
    <?php } ?>
    <div class="block-content">
        <?php echo wpb_js_remove_wpautop($content); ?>
    </div>
</div>
