<?php get_header(); ?>


<div class="inner-wrapper" id="global">


<div class="line">
	<div class="unit size3of4">
		<div class="masthead_lower" ><a href="/" class="black"><?php bloginfo( 'name' ); ?></a>
		 
					<?php
						if( is_user_logged_in() ) {
							echo '<span class="grey small"></span>';
						} else {
							echo '<a id="" title="Dashboard" href="/wp-admin/" class="black"><span class="grey small">Log in</span></a>';
						}
					?>
				
				 
		</div>  
		<?php if ( have_posts() ) : ?>                
		<div class="filtercontrols margintop26">
			<ul>
				<li class="expanded " title="Expanded view">&#202;</li><li class="contracted" title="Contracted view">&#194;</li>
			</ul>
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
				 
			<a class="pictogramfont" id="" href="#" title="Search posts"><span class="red">s</span></a>
			<input type="search"   value="<?php printf( __( '%s', 'flatfile' ), '' . get_search_query() . '' ); ?>" size="auto" name="s" id="search-box"> 

			</form>
		</div>
		

		<div id="news" class="index">
			<!-- this is our loop -->
			<?php while ( have_posts() ) : the_post() ?>
				<?php $arc_year = get_the_time('Y'); ?>
				<?php $arc_month = get_the_time('m'); ?>
				<?php $arc_day = get_the_time('d'); ?>		
			

			<!-- checks to see what category the post is in -->
			<?php 
			$category_to_check = get_term_by( 'name', 'Assignments', 'category' );
   			if ( post_is_in_descendant_category($category_to_check->term_id)) { ?>
	
			<div class="news-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 homework">
							<span style="float: right;"><?php edit_post_link('r'); ?>&nbsp;<a href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></span><h2><a title="Click to slide down" class="slidelink" onclick="toggleContent(<?php the_ID(); ?>)"><span>%</span> <?php the_author(); ?> completed <?php the_category(); ?><div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time(); ?></a></div></a></h2>
							
							<div class="hiddendrawer lastrow " id="postcontent-<?php the_ID(); ?>">
								<?php the_content(); ?>

								<?php
									if( is_user_logged_in() ) { ?>
								<div class="marginbottom16 resultsfooter3">

			 					 <a class="slidelink "  title="Show/Hide comment section" onclick="toggleComment(<?php the_ID(); ?>)"><?php comments_number( '<span class="">b</span>', '<span>b</span>', '<span>b</span>' ); ?><?php comments_number( '&nbsp;Add comment', '&nbsp;1', '&nbsp;%' ); ?></a> 
								 &nbsp; &nbsp;<?php the_tags('<span>J</span>&nbsp;', ' / '); ?> 
								
									<div class="hide margintop26" id="postcomment-<?php the_ID(); ?>">
									<?php $withcomments = 1;  comments_template(); ?>
									</div>
								</div>


								<?php	} ?>


							</div>
						</div>
	
					</div>
					
				<?php } else if (in_category( array( 'Link', 'Links'))) { ?>
	
				<div class="news-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 homework">
							<span style="float: right;"><?php edit_post_link('r'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></span><h2><a href="<?php echo get_the_content(); ?>"><span>w</span> <?php the_title(); ?></a> <div class="grey lucida marginleft10"><?php echo ff_rel_time(); ?> <?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?></div></h2>
						</div>
					</div>					


				<?php } else if (in_category( array( 'Bibliography', 'Reference', 'Readings', 'Reading'))) { ?>
	
				<div class="news-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 lastunit homework">

							<div style="float: right;"><?php edit_post_link('<span>r</span>'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></div>

							<h2><a title="Click to slide down" class="slidelink" onclick="toggleContent(<?php the_ID(); ?>)"><span>B</span> <?php the_title(); ?></a>
							<div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();  ?></a>
													
							<?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?>
						
							</div></h2>
							<div class="hiddendrawer lastrow " style="display: none" id="postcontent-<?php the_ID(); ?>">
								<?php the_content(); ?>
								<div class="marginbottom16 resultsfooter3">

			 					 <a class="slidelink "  title="Show/Hide comment section" onclick="toggleComment(<?php the_ID(); ?>)"><?php comments_number( '<span class="">b</span>', '<span>b</span>', '<span>b</span>' ); ?><?php comments_number( '&nbsp;Add comment', '&nbsp;1', '&nbsp;%' ); ?></a> 
								 &nbsp; &nbsp;<?php the_tags('<span>J</span>&nbsp;', ' / '); ?> 
								
									<div class="hide margintop26" id="postcomment-<?php the_ID(); ?>">
									<?php $withcomments = 1;  comments_template(); ?>
									</div>
								</div>
							</div>
						</div>
	
					</div>
					
			
			
				<?php } else if (in_category('Setup')) { ?>
	
				<div class="news-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 lastunit homework">

							<div style="float: right;"><?php edit_post_link('<span>r</span>'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></div>

							<h2><a title="Click to slide down" class="slidelink" onclick="toggleContent(<?php the_ID(); ?>)"><span>(</span> <?php the_title(); ?></a>
							<div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();  ?></a>
													
							<?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?>
						
							</div></h2>
							<div class="hiddendrawer lastrow " id="postcontent-<?php the_ID(); ?>">
								<?php the_content(); ?>
							</div>
						</div>
	
					</div>
					
				<?php } else if (in_category( array( 'Announcement', 'Announcements'))) { ?>
	
				<div class="news-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 lastunit homework">

							<div style="float: right;"><?php edit_post_link('<span>r</span>'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></div>

							<h2><a title="Click to slide down" class="slidelink" onclick="toggleContent(<?php the_ID(); ?>)"><span>Y</span> <?php the_title(); ?></a>
							<div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();  ?></a>
													
							<?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?>
						
							</div></h2>
							<div class="hiddendrawer lastrow " id="postcontent-<?php the_ID(); ?>">
								<?php the_content(); ?>
								<div class="marginbottom16 resultsfooter3">

			 					 <a class="slidelink "  title="Show/Hide comment section" onclick="toggleComment(<?php the_ID(); ?>)"><?php comments_number( '<span class="">b</span>', '<span>b</span>', '<span>b</span>' ); ?><?php comments_number( '&nbsp;Add comment', '&nbsp;1', '&nbsp;%' ); ?></a> 
								 &nbsp; &nbsp;<?php the_tags('<span>J</span>&nbsp;', ' / '); ?> 
								
									<div class="hide margintop26" id="postcomment-<?php the_ID(); ?>">
									<?php $withcomments = 1;  comments_template(); ?>
									</div>
								</div>
							</div>
						</div>
	
					</div>
					




				<?php } else if (in_category( array( 'Lectures', 'Lecture'))) { ?>
	
				<div class="news-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 lastunit homework">
							
							<?php if(has_post_thumbnail()) { ?>
							
							<span class="imageleft">
							<?php	the_post_thumbnail('thumbnail');  ?>
							</span>
							<?php } else {
								echo '';  
							} ?> 

							<div style="float: right;"><?php edit_post_link('<span>r</span>'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></div>
							
							<h2><a title="Click to slide down" class="slidelink" href="<?php the_permalink(); ?>"><span>S</span> <?php the_title(); ?></a>
							<div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();  ?></a>
													
							<?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?>
						
							</div></h2>



								
							<blockquote><?php
							   if (function_exists('has_excerpt') && has_excerpt()) the_excerpt();
							?>
							</blockquote>

							
						</div>
	
					</div>
					
				<?php } else if (in_category( array( 'Homework', 'Assignments', 'Assignment'))) { ?>
	

		
					<div class="news-wrapper">
						<div class="line lastrow">
							<div class="unit size1of1 lastunit homework">

								<div style="float: right;"><?php edit_post_link('<span>r</span>'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></div>

								<h2><a title="Click to slide down" class="slidelink" onclick="toggleContent(<?php the_ID(); ?>)"><span>&#237;</span> <?php the_title(); ?></a>
								<div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();  ?></a>
														
								<?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?>
							
								</div></h2>
								<div class="hiddendrawer lastrow " style="display: none" id="postcontent-<?php the_ID(); ?>">
									<?php the_content(); ?>
									<div class="marginbottom16 resultsfooter3">

				 					 <a class="slidelink "  title="Show/Hide comment section" onclick="toggleComment(<?php the_ID(); ?>)"><?php comments_number( '<span class="">b</span>', '<span>b</span>', '<span>b</span>' ); ?><?php comments_number( '&nbsp;Add comment', '&nbsp;1', '&nbsp;%' ); ?></a> 
									 &nbsp; &nbsp;<?php the_tags('<span>J</span>&nbsp;', ' / '); ?> 
									
										<div class="hide margintop26" id="postcomment-<?php the_ID(); ?>">
										<?php $withcomments = 1;  comments_template(); ?>
										</div>
									</div>
								</div>
							</div>
		
						</div>
					

	

				<?php } else { ?>
				
					<div class="news-wrapper">
						<div class="elseblock">
						<div class="line drawer">
							<div class="unit size1of1 lastUnit">
							<div class="avatarcircle"><?php echo '<a href="?author=' . get_the_author_meta('ID') . '"' . 'title="' . get_the_author_meta('nickname') . '">' . get_avatar( get_the_author_meta('ID'), $size = '120' ); 
		   ?></a><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  <a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>" class="grey lucida marginleft10"><?php echo ff_rel_time();  ?></a></h2></div>
							</div>
						</div>
						
						<div class="line hiddendrawer">
							<div class="unit size1of1 lastUnit  indentelseblock">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="line lastRow resultsfooter3 indentelseblock">
							<div class="unit size1of1 hiddendrawer lastUnit">
								<span>4</span> <?php the_category(' / '); ?>   <?php the_tags('&nbsp;&nbsp; <span>J</span>&nbsp;', ' / '); ?> 
		  <a class="slidelink"  title="Show/Hide comment section" onclick="toggleComment(<?php the_ID(); ?>)"><?php comments_number( '&nbsp;&nbsp;<span class="">b</span>', '&nbsp;&nbsp;<span>b</span>', '&nbsp;&nbsp;<span>b</span>' ); ?><?php comments_number( '&nbsp;Add comment', '&nbsp;1', '&nbsp;%' ); ?></a> 
							<?php edit_post_link('<span class="marginleft10 spot right">r</span>'); ?>	
								<div class="hide margintop26" id="postcomment-<?php the_ID(); ?>">
								<?php $withcomments = 1; // force comments form and comments to show on front page
								comments_template(); ?>
								</div>
							</div>
						</div>

					</div>
	
				<?php } ?>
			
			
			</div>
				<?php	
					endwhile;
				?>
				<div class="navigation"><p class="nav-previous"><?php posts_nav_link(); ?></p></div>

		 </div>
		<?php else : ?>
		
		<div class="search">
			<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
				 
					<?php
						if( is_user_logged_in() ) {
							echo '<a id="" title="Add a post" href="/wp-admin/post-new.php"';
							echo 'class="pictogramfont greyb "> &#252;</a>';
						} else {
						}
					?>

				
				 
				 
	<a class="pictogramfont" id="" href="#" title="Search posts"><span class="red">s</span></a>					<input type="search" autofocus  value="<?php printf( __( '%s', 'flatfile' ), '' . get_search_query() . '' ); ?>" size="16" name="s" id="search-box"> 

				
							</form>
</div>


						<h1 class="greya page-title "><?php printf( __( ':( No results ', 'flatfile' ), '"' . get_search_query() . '"'  ); ?></h1>
		
		<!-- here's where we'll put a search form if there're no posts -->
		 
		<?php endif; ?>      

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

				<li class="widget" id="classroom">
					<h2 class="widgettitle">Classroom</h2>
						<ul><li>
						<?php
							//displays all users with their avatar and their posts (titles)
							$blogusers = get_users_of_blog();
				
							if ($blogusers) {
							  foreach ($blogusers as $bloguser) {
								$user = get_userdata($bloguser->user_id);
					
								echo '<a href="?author=' . $user->ID . '"';
								echo 'title="' . $user->nickname . '">';
								echo get_avatar( $user->ID, 120 );

								echo '</a>';

							  wp_reset_query();  // Restore global post data stomped by the_post().
							  }
							}
							?>
						</li></ul>
				</li>

			<?php if ( !function_exists('dynamic_sidebar')
					|| !dynamic_sidebar() ) : ?>
				<li>Setup a sidebar.</li>
			<?php endif; ?>

				<li class="widget">
					<h2 class="widgettitle">About</h2>
					<p class="gray"><?php bloginfo( 'description' ); ?></p>
				</li>
			</ul>
	</div>
</div>


</div>

<?php get_footer(); ?>
</body>
</html>
