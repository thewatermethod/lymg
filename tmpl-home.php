<?php // Template Name: Home (One Column) ?>

<?php 
/**
 * This code is for our custom home page with the services and boats displayed
 *
 * @package understrap
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

		<?php if( function_exists( 'putRevSlider' ) ): ?>

			<?php putRevSlider( "home-page-slider" ) ?>

		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

		
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-8 col-sm-12 col-md-offset-2">
						<?php the_content();?>
					</div>
				</div>
			<?php endwhile;?>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		<?php
					
			$args = array( 'post_type' => 'service', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );?>

			<?php if( $loop->have_posts() ):?><h1>Our Services</h1><?php endif;?>

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	  		
	
	  		<div class="row">
				<div class="col-md-8 col-md-offset-1">
					<div class="col-md-4"><?php the_post_thumbnail(); ?></div>
				<div class="col-md-8">
					<h2><?php the_title(); ?></h2>
					<p><?php the_content(); ?></p>
				</div>
				</div>
			</div>
	  		<?php endwhile; ?>

	  		<?php wp_reset_postdata(); ?>

			<hr>

	  		<div class="row">

	  	<?php
	  		$args = array( 'post_type' => 'boat', 'posts_per_page' => 4 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
		?>	  			
	  		<div class="col-md-3">
	  			<figure id="attachment_45" class="wp-caption alignnone">
	  				<?php the_post_thumbnail(); ?>
	  				<figcaption class="wp-caption-text"><?php the_content(); ?>
	  				</figcaption>
	  			</figure>
	  		</div>
	  	<?php endwhile;	?>

	  	<?php wp_reset_postdata(); ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>