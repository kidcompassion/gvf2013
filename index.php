<?php
/*
Template Name: Template for Blog Page
*/
?>
<?php get_header(); ?>
<div class="container">
	<div id="content" class="row">

	
				<div id="main" class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12" role="main">

						<?php //generates title outside the loop
		if( is_home() && get_option('page_for_posts') ) {
			$blog_page_id = get_option('page_for_posts');
			echo '<h1>'.get_page($blog_page_id)->post_title.'</h1>';
		}
		?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<hr>
					<div class="clearfix">
						<div class="pull-left col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2">
							<?php if (has_post_thumbnail()) :?>
							<?php the_post_thumbnail('thumbnail');?>
							<?php else :?>
							<?php 
							$colors = array( "gvf_yellow", "gvf_pink", "gvf_green");
							$key = rand(0, 2);
							echo '<div class="'.$colors[$key] .' thumb-size">';
							?>


							<?php the_category();?>
						</div>
						<?php endif;?>
						</div>


						<article id="post-<?php the_ID(); ?>" <?php post_class( 'pull-right col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12' ); ?> role="article">
							
							<header class="article-header">
								<h4 class="black-text"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
							</header> <!-- end article header -->

							<section class="entry-content clearfix">
								<?php the_excerpt(); ?>
							</section> <!-- end article section -->

							<footer class="article-footer">
								<p class="tags"><?php the_tags(); ?></p>
							</footer> <!-- end article footer -->

							<?php // comments_template(); // uncomment if you want to use them ?>

						</article> <!-- end article -->
					</div>
					<?php endwhile; ?>

									<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
												<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
											</ul>


					<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article>

					<?php endif; ?>

				</div> <!-- end #main -->

				<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
</div>

<?php get_footer(); ?>
