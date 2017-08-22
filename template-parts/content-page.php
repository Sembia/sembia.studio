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
$container_size = get_post_meta($post->ID, 'fullwidth', true);
if(empty($container_size)) { $container_size = 'container'; }

$section_color = get_post_meta($post->ID, 'color', true);
if(empty($section_color)) { $section_color = 'page-default'; }

$image_background_meta = get_post_meta($post->ID, 'image-background', true);
if(empty($image_background_meta)) { $image_background_meta = 'image-default'; }

$background_image = get_the_post_thumbnail_url($post->ID, 'full');
?>

<div id="fullpage" <?php post_class(); ?>>

    <div class="section <?php echo $image_background_meta; ?>" data-title="<?php echo get_the_title(); ?>" <?php if($background_image){ ?> style="background-image:url('<?php echo $background_image;?>')" <?php } ?> >
        <div class="<?php echo $container_size; ?> <?php echo $section_color; ?>">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div><!-- .entry-content -->

    <?php if ( $sections->have_posts() ) : while ( $sections->have_posts() ) : $sections->the_post();
    // Do whatever you want to do for every page. the_title(), the_permalink(), etc...
        $container_size = get_post_meta($post->ID, 'fullwidth', true);
        if(empty($container_size)) { $container_size = 'container'; }
        $section_color = get_post_meta($post->ID, 'color', true);
        if(empty($section_color)) { $section_color = 'page-default'; }
        $background_image = get_the_post_thumbnail_url($post->ID, 'full');
    ?>
    <div class="section" data-title="<?php echo get_the_title(); ?>" <?php if($background_image){ ?> style="background-image:url('<?php echo $background_image;?>')" <?php } ?> >
        <div class="<?php echo $container_size; ?> <?php echo $section_color; ?>">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
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
