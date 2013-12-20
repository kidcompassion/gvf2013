<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>

	<header class="header">
		
		<?php
		    wp_nav_menu( array(
		        'menu'              => 'primary',
		        'theme_location'    => 'primary',
		        'depth'             => 2,
		        'container'         => 'div',
		        'container_class'   => 'main-nav navbar-collapse full-width',
		        'menu_class'        => 'nav navbar-nav nav-align',
		        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		        'walker'            => new wp_bootstrap_navwalker())
		    );
		?>


<?php if (is_front_page()) :?>		
		<?php
		     $sticky =  get_option( 'sticky_posts' );
		     //sets wp_query to loop posts
		     $args = array (
		       'post_type' => array('post'),
		       'post__in'  =>$sticky,//pull only the sticky posts
		      'ignore_sticky_posts' => 1
		     );  
		     $the_query = new WP_Query($args);

			 if ( $sticky[0] ): ?>


				<?php if ( $the_query->have_posts() ) : ?>
		         <?php while ( $the_query->have_posts() ) :?>
		            <?php $the_query->the_post(); ?>
			         	<?php if (has_post_thumbnail()){	
			         		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

							echo '<div class="sticky-header container jumbotron" style="background-image: url('.$url.')">';
						} else {
							$colors = array( "gvf_yellow", "gvf_pink", "gvf_green");
							$key = rand(0, 2);
							echo '<div class="'.$colors[$key] .'full-width sticky">';
						}
						?>
						<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="headline-text">
			            <h2 class="text-shadow"><?php the_title();?></h2>
			            <div class="excerpt">
			            	<?php the_excerpt();?>
			            </div>
			        	</div>
			        	</div><!--inner-->
			        	</div><!--containr-->
		   
		          <?php endwhile; ?>
		          
		        <?php endif;?>


	</div><!--full-width-->

	<?php endif;?>





<!---if is normal page-->


	<?php elseif (has_post_thumbnail() && !is_home()):?>

		<?php	         		
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo '<div class="page-header relative jumbotron" style="background: url('.$url.') no-repeat center center; background-size: cover;">';
		?>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
			<h2> <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></h2> 
			<p><?php echo get_post(get_post_thumbnail_id())->post_content; ?></p>
		</div>
		</div>
		</div>

<?php endif;?>

	</header>
