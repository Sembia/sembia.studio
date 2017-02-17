<?php
/**
 * Display a grid of images, with top being full width.
 *
 * @param string $caption
 * @param array $image1
 * @param array $image2
 * @param array $image3
 */
?>

<div class="sembia-image-grid sembia-image-grid-3">
    <div class="row">
        <div class="col-md-12">
            <div class="image-half">
                <img src="<?php echo $image1[0] ?>" alt="<?php echo $caption; ?> (Image 1 of 3)" class="image-full" />
                <?php if ($caption) { ?>
                    <span class="sembia-image-caption"><?php echo $caption; ?></span>
                <?php } ?>
            </div><!-- /.image-primary -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="image-half">
                <img src="<?php echo $image2[0] ?>" alt="<?php echo $caption; ?> (Image 2 of 3)" class="image-full" />
            </div><!-- /.image-half -->
        </div>
        <div class="col-md-6">
            <div class="image-half">
                <img src="<?php echo $image3[0] ?>" alt="<?php echo $caption; ?> (Image 3 of 3)" class="image-full" />
            </div><!-- /.image-half -->
        </div>
    </div>
</div>
