<?php
/**
 * Displays large header text.
 *
 * @param string $title
 * @param string $header_size
 * @param string $accent
 */
?>
<div class="block-title-container block-headline accent-<?php echo $accent; ?>">
    <?php echo '<' . $header_size . ' class="block-title block-headline-title">' . $title . '</' . $header_size . '>'; ?>
</div>
