<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">

		<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<h1><?php the_title();?></h1>
									
									<div class="row">
									<p class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">Screening date:<?php the_field('screening_date');?></p>
									<p class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">Screening time:<?php the_field('screening_time');?></p>
									<p class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">Screening location: <?php the_field('screening_location');?></p>
									</div>
									<?php if (the_field('movie_trailer')):?>
									<p><?php the_field('movie_trailer');?></p>
									<?php endif;?>
									<?php the_content(); ?>

									<p>Price: <?php the_field('ticket_price');?></p>
							<?php endwhile; ?>

							<?php else : ?>

									
							<?php endif; ?>

					</div>
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">

						<?php get_sidebar(); ?>
</div>
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
