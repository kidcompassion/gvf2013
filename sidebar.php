<?php if (get_post_type() === 'post'):?>
<div id="sidebar" class="sidebar col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" role="complementary">
SINGLE
<div class="dates">
<?php the_time( 'M' ); ?> 
<?php the_time( 'd' ); ?><br />
20<?php the_time( 'y' ); ?>

</div>


<div class="authorImg"><?php 
$authoravatar =  get_the_author_meta('user_email'); 
echo get_avatar($authoravatar);

?>
</div>

<div class="byline">Posted by <?php the_author(); ?></div>
<div class="pull_quote"><?php the_field( 'pull_quote' );?></div>
</div>
<?php elseif (get_post_type() === 'screeningdetails'):?>
	dkjfdjshfdl
		<p>Title: <?php the_title();?></p>
									<p>Country of origin: <?php the_field('country_of_origin'); ?></p>
									<p>Production year: <?php the_field('year_of_production'); ?></p>
									<p>Running time: <?php the_field('running_time');?></p>
									<p>Director: <?php the_field('director');?></p>
									<p>Language: <?php the_field('language');?></p>
									<p>Website: <?php the_field('website');?></p>


<?php else:?>
<div id="sidebar" class="sidebar col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" role="complementary">
	<?php if ( dynamic_sidebar('sidebar') ) : else : endif; ?>
<?php endif;?>
