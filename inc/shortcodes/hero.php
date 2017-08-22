<?php
/**
 * Display a button link.
 *
 * @param array $image
 * @param string $title
 * @param string $subtitle
 * @param string $header_size
 * @param string $accent
 */
?>
<div class="container">
    <div class="block-title-container block-hero accent-<?php echo $accent; ?>">
        <div class="image-primary">
            <?php if ($image) { ?>
                <img src="<?php echo $image[0] ?>" alt="<?php echo $title; ?>" class="image-full sr-only" />
            <?php } ?>

            <?php
            echo '<' . $header_size . ' class="block-title block-heading text-center">' . $title . '</' . $header_size . '>';
            if ($subtitle) {
                echo '<h6 class="block-subtitle block-heading text-center">' . $subtitle . '</h6>';
            }
            ?>
        </div>
    </div>
</div>
