<?php
/*
Template Name: Template for list of Festival Screenings
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
				'terms' => array('current-fest')
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
		<div class="event-date row">
			<?php
			$date = DateTime::createFromFormat('Ymd', $screener);
			echo $date->format('M d, Y'); //changes date syntax?>
			</div>

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
				'terms' => array('current-fest')
			)
		)
		);


		// get results
		$the_query = new WP_Query( $args );
		 
		// The Loop
		?>
		<?php if( $the_query->have_posts() ): ?>
			<ul>
				<li class="table-header-wrap row">
					<p class="table-header col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
					Starting Time
				</p>
				<p class="table-header col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
					Film
				</p>
				<p class="table-header col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
					Venue
				</p>

				</li>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php if ($screener === get_field('screening_date')) :?>
			<li class=" screening-listing row">
				<p class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
					<?php echo get_field('screening_time');?>
				</p>
				<p class="event-title col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
					<a href="<?php the_permalink();?>"><?php the_title();?></a>
				</p>
				<p class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
</div>
</div>
<?php get_footer(); ?>
