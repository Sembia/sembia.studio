<?php
/**
 * Display a grid of images, both 50% width
 *
 * @param string $caption
 * @param array $image1
 * @param array $image2
 */
?>

<div class="sembia-image-grid sembia-image-grid-2">
    <div class="row">
        <div class="col-md-6">
            <div class="image-primary">
                <img src="<?php echo $image1[0] ?>" alt="<?php echo $caption; ?> (Image 2 of 2)" class="image-full" />
            </div><!-- /.image-primary -->
        </div>
        <div class="col-md-6">
            <div class="image-primary">
                <img src="<?php echo $image2[0] ?>" alt="<?php echo $caption; ?> (Image 2 of 2)" class="image-full" />
                <?php if ($caption) { ?>
                    <span class="sembia-image-caption"><?php echo $caption; ?></span>
                <?php } ?>
            </div><!-- /.image-half -->
        </div>
    </div>
</div>
