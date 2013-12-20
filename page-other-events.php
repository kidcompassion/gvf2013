<?php
/*
Template Name: Template for list of Non-Festival Events
*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">

<h1><?php the_title();?></h1>
<?php 

// args

 
$posts = get_posts(array(
	'post_type'		=> 'screeningdetails',
	'posts_per_page'	=> -1,
	'meta_key'		=> 'screening_date',
	'orderby'		=> 'meta_value_num',
	'order'			=> 'ASC',
	'tax_query' => array(
			array(
				'taxonomy' => 'screening_type', //or tag or custom taxonomy
				'field' => 'slug',
				'terms' => array('non-festival-event')
			)
		)
));
 


if($posts){
	foreach($posts as $post){



			$screening_array[] = get_field('screening_date'); //creates array of dates

	}

}
?>


<?php $screening_array = array_unique($screening_array, SORT_NUMERIC);?>




<?php foreach($screening_array as $screener):?>
		<h1>
			<?php
			$date = DateTime::createFromFormat('Ymd', $screener);
			echo $date->format('M d, Y'); //changes date syntax?>
			</h1>
			



		<?php


			$args = array(
			'post_type'		=> 'screeningdetails',
			'posts_per_page'	=> -1,
			'meta_key'		=> 'screening_time',
			'orderby'		=> 'meta_value_num',
			'order'			=> 'ASC',
			'tax_query' => array(
			array(
				'taxonomy' => 'screening_type', //or tag or custom taxonomy
				'field' => 'slug',
				'terms' => array('non-festival-event')
			)
		)
		);


		// get results
		$the_query = new WP_Query( $args );
		 
		// The Loop
		?>
		<?php if( $the_query->have_posts() ): ?>
			<ul>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php if ($screener === get_field('screening_date')) :?>
			<li class="row">
				<p class="col-xs-6 col-md-4"><?php the_title();?></p>
				<p class="col-xs-6 col-md-4">
					<?php echo get_field('screening_time');?> p.m.
				</p>
				<p class="col-xs-6 col-md-4">
					<?php echo get_field('screening_location');?> 
				</p>
			</li>
		<?php endif;?>

			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		 
		<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>


<?php endforeach?>

</div>
</div></div>
<?php get_footer(); ?>
