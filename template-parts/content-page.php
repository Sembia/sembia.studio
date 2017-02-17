<?php
/**
* Template part for displaying page content in page.php
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Sembia
*/

$page_id = $post->ID;
$sections = new WP_Query(array(
    'post_type'      => 'page', // set the post type to page
    'posts_per_page' => -1, // number of posts (pages) to show
    'orderby' => 'order_clause',
    'order' => 'ASC',
    'meta_query' => array(
        'parent_clause' => array(
            'key' => 'fullpage-parent',
            'value' => $page_id,
            'compare' => '='
        ),
        'order_clause' => array(
            'key' => 'fullpage-order',
            'compare' => 'EXISTS'
        )
    )
));
?>

<div id="fullpage" <?php post_class(); ?>>

    <div class="section" data-title="<?php echo get_the_title(); ?>">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php if ( $sections->have_posts() ) : while ( $sections->have_posts() ) : $sections->the_post();
    // Do whatever you want to do for every page. the_title(), the_permalink(), etc...
    ?>
    <div class="section" data-title="<?php echo get_the_title(); ?>">
        <?php the_content(); ?>
    </div>
    <?php endwhile; endif; wp_reset_postdata();?>

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__( 'Edit %s', 'sembia' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</div><!-- #post-## -->
