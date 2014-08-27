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

	<div id="primary" class="content-area">
    <!-- slide show goes here -->
<div id="container">
			<div id="slides">
				<?php 
				$args=array(
					'tag' => 'slideshowhome'
				);
				$my_query = new WP_Query($args);

				if (  $my_query->have_posts() ) : while (  $my_query->have_posts() ) :  $my_query->the_post();
					/*$args = array(
					 'post_type' => 'post',
					 'numberposts' => -1,
					 'order' => 'ASC',
					 'post_mime_type' => 'image',
					 'post_status' => null,
					 'post_parent' => $post->ID
					);
					$attachments = get_posts( $args );
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							echo wp_get_attachment_image($attachment->ID , 'full');	
						}
					}*/
					//get_template_part( 'content', get_post_format() );

					$attachments = get_attached_media( 'image', $post->ID );
					
					
					
					 
					if ( $attachments ) {
						$count = 1;
						foreach ( $attachments as $attachment ) {
							$img_full = wp_get_attachment_url($attachment->ID);
							$img_link =  get_attachment_link($attachment->ID);
    						$img = wp_get_attachment_image($attachment->ID, 'full');
							$attachment_meta = wp_get_attachment($attachment->ID);
							echo '<a id="slideTarget' . $count . '" href="'. $img_link . '" data-desc="' .  $attachment_meta['description'] . '" data-title="' .  $attachment_meta['title'] . '" data-caption="' . $attachment_meta['caption'] . '">' . $img . '</a>';
							$count++;
						}
					}
					
					
				endwhile; 
				
				else:
				//slide show missing show generic slide
				echo '<a id="slideTarget1" href="#" data-desc="Welcome to BWAC" data-title="BWAC" data-caption="Support Living Artists"><img src="/wordpress/wp-content/themes/bwac_wp_theme/images/bwac_cityscape_home.jpg" border="0"></a>';
				
				
				endif; 
				wp_reset_postdata();
				?>
				
                
				<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
				<a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
			</div>
			<div id ="slideInfoDetails"><a><div id="slideInfoDetailsInnner"><div id="slideInfoTitle"></div><div id="slideInfoCaption"></div><!--div id="slideInfoDescription"></div--></div></a></div>
		</div>
 <!-- end slide show -->       
		<main id="main" class="site-main" role="main">
		

		<?php 
			$args=array(
					'tag' => 'featured'
				);
			$my_query = new WP_Query($args);
			if ( $my_query->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
            <div class='contentModuleWrapper'>
			<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<div class='contentModule'>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					 
					     get_template_part( 'content', 'front' );
					
				?>
                 </div>

			<?php endwhile; 
				wp_reset_postdata();
			?>
				<div class='clearFloat'>&nbsp;</div></div>
			<?php bwac_wp_theme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
