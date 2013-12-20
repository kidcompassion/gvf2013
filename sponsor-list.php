<ul>
<?php 
$args = array(
'post_type' => array ( 'sponsordetails'),
'posts_per_page' => '99999999'

);
$sponsor_query = new WP_Query($args);
if ( $sponsor_query->have_posts() ) : while ( $sponsor_query->have_posts() ) : $sponsor_query->the_post(); ?>

		<li class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <a href="<?php echo the_field('sponsor_url');?>"><?php the_title(); ?></a>
    </li>
<?php endwhile;?>
<?php endif;?>
</ul>
	<?php wp_reset_postdata();?>
