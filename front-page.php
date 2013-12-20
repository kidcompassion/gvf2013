<?php
/*
Template Name: Template for front page of the site
*/
?>

<?php get_header(); ?>


	
<div class="center padding">

<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>

		<?php endwhile; ?>
		<!--do not delete-->
		<?php else : ?>
		Not Found
		Sorry, but you are looking for something that isn't here.
		<!--do not delete-->
		<?php endif; ?>

</div>						



<div>
	<ul>
<?php
$the_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );
if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();


	if (has_post_thumbnail()){
			$post_thumbnail_id = get_post_thumbnail_id();
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			   echo '<li class="blog-post-wrapper col-lg-3 col-md-3 col-sm-4 col-xs-12 relative" style="background: url('. $post_thumbnail_url .') no-repeat center center; background-size: cover;">';
				echo '<div class="overlay">';			
		} else {
			$colors = array( "gvf_yellow", "gvf_pink", "gvf_green");
			$key = rand(0, 2);
			echo '<li class="' . $colors[$key] .' blog-post-wrapper col-lg-3 col-md-3 col-sm-4 col-xs-12 relative">';
		}
		?>
	    	<a href="<?php the_permalink() ?>" rel="bookmark">
		   	<h3 class="text-shadow"><?php the_title(); ?></h3>
		   </a>
			<p><?php the_excerpt();?></p>

			<div class="blog-post-date-bg absolute"></div>
			<span class="blog-post-date absolute"><?php the_time('M');?><br /><?php the_time('j');?></span>
		</li>
		<?php wp_reset_postdata();?>
		<?php endwhile; ?>
	<?php endif;?>
	</ul>
</div>
</div>
<div class="clearfix"></div>


<div class="sponsors">
	<?php get_template_part('sponsor-list');?>

</div>

<?php get_footer(); ?>
