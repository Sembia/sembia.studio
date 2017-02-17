<?php
/**
 * Display a single image
 *
 * @param string $caption
 * @param string $align
 * @param string $float
 * @param array $image1
 */

if (empty($float)) { $float_position = 'no-float'; } else { $float_position = 'float'; }
?>

<div class="sembia-image-grid sembia-image-grid-5 <?php echo $align; ?> <?php echo $align; ?>-<?php echo $float_position; ?>">
    <img src="<?php echo $image1[0] ?>" alt="<?php echo $caption; ?>" class="<?php echo $align; ?>" />
</div>
