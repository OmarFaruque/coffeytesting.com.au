<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config;


	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	get_header();

	$title  = get_the_title();
	$t_link = home_url('/');
	$t_sub = "";

	// echo 'title: ' . get_the_title();

	if( get_post_meta(get_the_ID(), 'header', true) != 'no'){
		echo avia_title(array('heading'=>'strong', 'title' => $title, 'link' => $t_link, 'subtitle' => $t_sub));
	} 
	
	do_action( 'ava_after_main_title' );

?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>
			
			<div class='container template-blog template-single-blog '>

				<main id="mainCon" class='content units <?php avia_layout_class( 'content' ); ?> <?php echo avia_blog_class_string(); ?>' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>

                    <?php
                    /* Run the loop to output the posts.
                    * If you want to overload this in a child theme then include a file
                    * called loop-index.php and that will be used instead.
                    *
					*/
					if(have_posts()): while(have_posts()): the_post();
					get_template_part( 'inc/loop', 'index' );
					endwhile; endif;
                    ?>

				<!--end content-->
				</main>

				<?php
				$avia_config['currently_viewing'] = "blog";
				//get the sidebar
				get_sidebar();


				?>


			</div><!--end container-->

		</div><!-- close default .container_wrap element -->


<?php 
		get_footer();
		
		