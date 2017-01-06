<?php
/**
* Display a subtitle and title block within a hero element.
*
* @param string $subtitle
* @param string $title
* @param string $header_size
* @param string $accent
*/
?>

<div class="block-title-container accent-<?php echo $accent; ?>">
    <?php
    if ($subtitle) {
        echo '<h6 class="block-subtitle block-heading">' . $subtitle . '</h6>';
    }
    echo '<' . $header_size . ' class="block-title block-heading">' . $title . '</' . $header_size . '>';
    ?>
</div>
