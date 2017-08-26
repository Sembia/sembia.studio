<?php
/**
 * Template for displaying search forms in Sembia theme
 *
 * @package WordPress
 * @subpackage sembia`
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="row">
        <div class="form-group mx-sm-3">
            <label for="<?php echo $unique_id; ?>"><span class="sr-only"><?php echo _x( 'Search for:', 'label', 'sembia' ); ?></span></label>
            <input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'sembia' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-submit btn btn-default"><?php echo _x( 'Search', 'submit button', 'sembia' ); ?></button>
        </div>
    </div>
</form>
