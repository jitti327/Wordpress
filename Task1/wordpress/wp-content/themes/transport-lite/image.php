<?php
/**
 * The template for displaying image attachments.
 *
 * @package Transport Lite
 */

get_header(); ?>

<div class="container">
     <div class="website-pageholder">
        <section class="content_wrapper_area">
			<?php while ( have_posts() ) : the_post(); ?>    
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>    
                        <div class="entry-meta">
                            <?php
                                $metadata = wp_get_attachment_metadata();
                                printf( __( 'Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>', 'transport-lite' ),
                                    esc_attr( get_the_date( 'c' ) ),
                                    esc_html( get_the_date() ),
                                    esc_url( wp_get_attachment_url() ),
                                    esc_attr($metadata['width']),
                                    esc_attr($metadata['height']),
                                    esc_url( get_permalink( $post->post_parent ) ),
                                    get_the_title( $post->post_parent )
                                );
    
                                edit_post_link( __( 'Edit', 'transport-lite' ), '<span class="edit-link">', '</span>' );
                            ?>
                        </div><!-- .entry-meta -->
    
                        <nav role="navigation" id="image-navigation" class="image-navigation">
                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'transport-lite' ) ); ?></div>
                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'transport-lite' ) ); ?></div>
                        </nav><!-- #image-navigation -->
                    </header><!-- .entry-header -->
    
                    <div class="entry-content">
                        <div class="entry-attachment">
                            <div class="attachment">
                                <?php transport_lite_the_attached_image(); ?>
                            </div><!-- .attachment -->
    
                            <?php if ( has_excerpt() ) : ?>
                            <div class="entry-caption">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-caption -->
                            <?php endif; ?>
                        </div><!-- .entry-attachment -->
    
                        <?php
                            the_content();
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'transport-lite' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                    </div><!-- .entry-content -->
    
                    <?php edit_post_link( __( 'Edit', 'transport-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                </article><!-- #post-## -->
    
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
    
            <?php endwhile; // end of the loop. ?>          

        </section>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>