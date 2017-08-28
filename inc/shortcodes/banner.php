<?php
/**
 * Display a basic bootstrap container.
 *
 * @param array $image
 * @param string $subtitle
 * @param string $title
 * @param string $header_size
 * @param string $content
 */
?>

<div class="banner-block text-center">
    <?php if ($image) { ?>
    <img src="<?php echo $image[0] ?>" class="image-full sr-only" />
    <?php } ?>
    <div class="banner-block-inner">
        <?php
        if ($subtitle) {
            echo '<h6 class="block-subtitle block-heading">' . $subtitle . '</h6>';
        }
        echo '<' . $header_size . ' class="block-title block-heading">' . $title . '</' . $header_size . '>';
        ?>
        <?php echo wpb_js_remove_wpautop($content); ?>
    </div>
</div>
