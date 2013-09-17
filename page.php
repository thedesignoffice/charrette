<?php get_header(); ?>

<div class="inner-wrapper" id="global">


<div class="line">
	<div class="unit size3of4 ">

		<div class="masthead_lower" ><a href="/" class="black"><?php bloginfo( 'name' ); ?></a>
		 
					<?php
						if( is_user_logged_in() ) {
							echo '<span class="grey small"></span>';
						} else {
							echo '<a id="" title="Edit Profile" href="/wp-admin/profile.php" class="black"><span class="grey small">Log in</span></a>';
						}
					?>
				
				 
		</div>  
		<div class="search">
			<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
				 
					<?php
						if( is_user_logged_in() ) {
							echo '<a id="" title="Add a post" href="/wp-admin/post-new.php"';
							echo 'class="pictogramfont greyb "> &#252;</a>';
						} else {
						}
					?>

				
				 
	<a class="greyb pictogramfont" id="searchid" href="#" title="Search posts">s</a><input type="search" autofocus  value="<?php printf( __( '%s', 'flatfile' ), '' . get_search_query() . '' ); ?>" size="16" name="s" class="hide" id="search-box"> 
			</form>
		</div>
		

		<?php if ( have_posts() ) : ?>                

		<?php
			// Get the URL of this category
			$category_link = get_category_link( $category_id );
		?>

		<?php while ( have_posts() ) : the_post() ?>
		<!-- this is our loop -->
		
		
					<?php $arc_year = get_the_time('Y'); ?>
					<?php $arc_month = get_the_time('m'); ?>
					<?php $arc_day = get_the_time('d'); ?>		
		

		<h1><div style="float: right; letter-spacing: 10px;" class="mpix large grey">
					 <?php previous_post_link('%link', '‘', TRUE); ?><?php next_post_link('%link', '—', TRUE); ?> 
			</div>
			<span><?php echo get_avatar( get_the_author_meta('ID'), $size = '25' ); 
   ?></span><?php the_title(); ?></h1>
				
				
		<div id="content" class="row-wrapper" >
		
			<div class="line">
				<div class="unit size1of1 indentsingle">
					<?php the_content(); ?>&nbsp;

				</div>
			</div>
		
			<div class="line lastRow resultsfooter3 indentsingle">
				<div class="unit size1of4">
					<span>f</span> <?php the_author_posts_link(); ?> 	
				</div>
				<div class="unit size3of4 lastUnit">
				<span>{</span> <a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time(); ?></a> &nbsp;&nbsp;
				
				
				<span style="float: right;"><?php edit_post_link('r'); ?></span>
				</div>
			</div>
		
		
			<div class="line">
				<div class="unit size1of1 indentsingle">
					<span class="pictogramfont comment_medium">b</span>
					<?php comments_template(); ?>
				</div>
			</div>
		
		
			<?php	
				endwhile;
				endif;
			?>
		 </div>

	</div>
	
	<div id="sidebar1b" class="unit size1of4 lastUnit">
			
			<ul id="sidebar">

									<?php
										if( is_user_logged_in() ) {
										echo '<div class="loggedin"><div class="small"><a href="/wp-admin/">';
	global $userdata; get_currentuserinfo(); echo get_avatar( $userdata->ID, 46 );	
	      echo 'Logged in as ' . $current_user->nickname . "\n";
echo '</a></div></div>';
										} else {
										}
									?>

				<?php get_sidebar(); ?>


			</ul>
	</div>
</div>


</div>

<?php get_footer(); ?>
</body>
</html>





