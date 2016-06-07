<?php
/*
Theme Name: Sunsetcoders
Description: Sunsetcoders Website
Version: 1.0
Author: Sunsetcoders
Author URI: http://www.sunsetcoders.com
Tags: powerful, cheat, sheet
*/
?>
<?php get_header(); ?>


	<div class="full-screen">


			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
					 the_content(); 
  
				endwhile; endif; 
			?>

		</div> 


<?php get_footer(); ?>
