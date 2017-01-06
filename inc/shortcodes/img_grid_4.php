<?php
/**
 * Display a single full width image
 *
 * @param string $caption
 * @param array $image1
 */
?>

<div class="sembia-image-grid sembia-image-grid-4">
    <div class="image-primary">
        <img src="<?php echo $image1[0] ?>" alt="<?php echo $caption; ?>" class="image-full" />
            <?php if ($caption) { ?>
            <span class="sembia-image-caption"><?php echo $caption; ?></span>
            <?php } ?>
    </div><!-- /.image-primary -->
</div>
