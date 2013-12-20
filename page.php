<?php
/*
Template Name: Template for a Generic Page
*/
?>
<?php get_header(); ?>
<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-lg-xl">

						<h1><?php the_title(); ?></h1>
						

							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<?php the_content(); ?>


							<?php endwhile; else : ?>

							<?php endif; ?>
				</div>
						
				</div> 
</div>

<?php get_footer(); ?>
