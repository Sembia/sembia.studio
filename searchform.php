<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
    <label class="sr-only"><?php echo _x( 'Search for:', 'label' ) ?></label>
    <input type="search" class="search-field form-control"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

    <input type="submit" class="search-submit btn btn-default"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
