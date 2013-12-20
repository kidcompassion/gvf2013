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

			<div id="container">

				<div class="row">

				

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<?php the_content(); ?>

				

							<?php endwhile; ?>

							<?php else : ?>

									

							<?php endif; ?>


						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
