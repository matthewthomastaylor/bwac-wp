<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bwac_wp_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">HUHHHHHHH
		<main id="main" class="site-main" role="main">
		<div id="container">
			<div id="slides">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					$args = array(
					 'post_type' => 'attachment',
					 'numberposts' => -1,
					 'orderby'=> 'menu_order',
					 'order' => 'ASC',
					 'post_mime_type' => 'image',
					 'post_status' => null,
					 'post_parent' => $post->ID
					);
					$attachments = get_posts( $args );
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							echo "helllo" . $attachment->post_excerpt;
							echo  "hello" . $attachment->post_content;
							echo wp_get_attachment_image($attachment->ID , 'full' );	
						}
					}
				endwhile; endif; ?>

				<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
				<a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php bwac_wp_theme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
