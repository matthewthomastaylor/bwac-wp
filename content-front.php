<?php
/**
 * @package bwac_wp_theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$categories = get_the_category( get_the_ID() );
	if($categories){
	foreach($categories as $category) {
	    //just do it once
		echo "<h2><a href='" . get_category_link( $category->term_id ) . "'>" . $category->name . "</a></h2>";
		break;
	}
	}
	
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail();
} 
?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->