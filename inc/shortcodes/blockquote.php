<?php
/**
 * For quoting blocks of content from another source within your document.
 *
 * @param string $text_block
 * @param string $footer
 * @param string $source
 */
?>

<blockquote>
  <p><?php echo $text_block; ?></p>
  <?php if ($footer) { ?>
      <footer><?php echo $footer; ?> <cite title="Source Title"><?php echo $source; ?></cite></footer>
  <?php } ?>
</blockquote>
