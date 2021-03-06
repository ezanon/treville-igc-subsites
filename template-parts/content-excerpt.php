<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package Treville
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

            <?php treville_entry_categories(); ?>	
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<!--<?php treville_entry_meta(); ?>-->

	</header><!-- .entry-header -->

	<?php treville_post_image_archives(); ?>

	<div class="post-content">

		<div class="entry-content entry-excerpt clearfix">

			<?php the_excerpt(); ?>
			<?php treville_more_link(); ?>

		</div><!-- .entry-content -->

	</div>

</article>
