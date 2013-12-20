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

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">

								<header class="article-header">

									
						
									<p class="subheadline">		
									<a href="<?php echo the_field('sponsor_url');?>"><h1><?php the_title(); ?></h1>
										<?php the_post_thumbnail('thumbnail');?>
									</a>
									</p>

								</header> <!-- end article header -->

								<section>
									<?php the_content(); ?>
							</section> <!-- end article section -->

								
								<?php comments_template(); ?>

							</article> <!-- end article -->

							<?php endwhile; else : ?>

								

							<?php endif; ?>

						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
