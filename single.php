<?php get_header(); ?>

			<div class="container">

				<div class="row">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">

								<header class="article-header">

									<h1><?php the_title(); ?></h1>
						
									<p class="subheadline"><?php the_field( 'post_description' );?></p>

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
