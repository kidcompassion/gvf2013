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


		<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<h1><?php the_title();?></h1>
									
									<div class="table-header-wrap row">
									<p class="table-header col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">Screening date</p>
									<p class="table-header col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">Screening time</p>
									<p class="table-header col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">Screening location</p>
									</div>

									<div class="margin-top-bottom row">
									<p class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">



									<?php
									$date = DateTime::createFromFormat('Ymd', get_field(screening_date));
									echo $date->format('M d, Y'); //changes date syntax?>
									</p>
									<p class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12"><?php the_field('screening_time');?></p>
									<p class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12"><?php the_field('screening_location');?></p>
									</div>
									<?php if (the_field('movie_trailer')):?>
									<p><?php the_field('movie_trailer');?></p>
									<?php endif;?>
									<p>
									<?php the_content(); ?>
								</p>

									<p>Price: $<?php the_field('ticket_price');?></p>
							<?php endwhile; ?>

							<?php else : ?>
							Sorry, there is no content here.
									
							<?php endif; ?>

					</div>
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
				<?php get_sidebar(); ?>
			</div>
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
