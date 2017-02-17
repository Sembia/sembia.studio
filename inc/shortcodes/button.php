<?php
/**
 * Display a button link.
 *
 * @param string $link
 * @param array $text
 * @param string $target
 */

if (empty($target)) { $target_loc = '_self'; } else { $target_loc = '_blank'; }

?>

<div class="button-wrapper">
    <a class="btn btn-primary" href="<?php echo $link; ?>" role="button" target="<?php echo $target_loc; ?>"><?php echo $text; ?></a>
</div>
