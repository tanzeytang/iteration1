<?php
/**
 * Template Name: water quality and quantity
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">

		<form method = "POST">
		<input type = "TEXT" name="search" />
		<input type = "SUBMIT" name="submit" value="Search" />
		</form>

		<main id="main" class="site-main" role="main">
			
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );
				// custom codes:
				
				$output = NULL;
				if(isset($_POST['submit'])){
					
					$search = $_POST['search'];
					
					global $wpdb;
					//$water = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}water WHERE postcode = $search", OBJECT );
					$water = $wpdb->get_results( "SELECT * FROM water" );
					//$water = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wp_waterquality WHERE postcode == $search;",OBJECT);
					echo "<table>";
				    foreach($water as $water){
					echo "<tr>";
					echo "<td>".$water->postcode."</td>";
					echo "<td>".$water->suburb."</td>";
					echo "<td>".$water->quality."</td>";
					echo "</tr>";
					}
					echo "</table>";

				}
					

				//custom codes finished

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
