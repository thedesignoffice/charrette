<?php get_header(); ?>


<div class="inner-wrapper">


<div class="line">
	<div class="unit size3of4">
		<div class="masthead_lower" ><a href="/" class="black"><?php bloginfo( 'name' ); ?></a>
		 
					<?php
						if( is_user_logged_in() ) {
							echo '<span class="grey small"></span>';
						} else {
							echo '<a id="" title="Dashboard" href="/wp-admin/" class=""><span class="grey small">Log in</span></a>';
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
		


		<?php
			$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
			$author = get_queried_object();
			$user_info = get_userdata($author->ID);
		?>




		<div class="filtercontrols margintop26">
			<ul>
					<li class="expanded " title="Expanded view">&#202;</li><li class="contracted" title="Contracted view">&#194;</li>
			</ul>
		</div>
		<?php
			/* Queue the first post, that way we know who
			 * the author is when we try to get their name,
			 * URL, description, avatar, etc.
			 *
			 * We reset this later so we can run the loop
			 * properly with a call to rewind_posts().
			 */
			if ( have_posts() ) {
				the_post(); ?>
				<h1><span>f</span><?php the_author_meta('nickname') ?>  has  <?php the_author_posts(); ?> post(s)</h1>

			<?php	} else { 
				echo'<h1><span>f</span>No posts yet from '; 
	     		 echo $user_info->nickname;
//				echo'</h1><p>A post is needed to see the avatar, bio and more</p><p style="font-size: 1000px; line-height: 90%" class="grey  mpix">x</p>'; 
//				echo '<style>.avatarbio, .filtercontrols, .absences { display: none; }</style>';
				} 
			?>
			
		<?php
		$authorid = get_the_author_meta('ID');
			/* Rewind Posts
			 */
			if ( have_posts() )
			rewind_posts();
		?>
				
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
							<div class="hiddendrawer lastrow "  id="postcontent-<?php the_ID(); ?>">
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
							

							<div style="float: right;"><?php edit_post_link('<span>r</span>'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></div>
							
							<h2><a title="Click to slide down" class="slidelink" onclick="toggleContent(<?php the_ID(); ?>)"><span>S</span> <?php the_title(); ?></a>
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
		   ?></a><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  <a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>" class="grey lucida marginleft10"><?php echo ff_rel_time(); ?></a></h2></div>
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
							 <?php edit_post_link('<span class="spot right">r</span>'); ?>	
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
	
	</div>
	
	<div id="sidebar1b" class="unit size1of4 lastUnit">
									<?php
										if( is_user_logged_in() ) {
										echo '<div class="loggedin"><div class="small"><a href="/wp-admin/">';
	global $userdata; get_currentuserinfo(); echo get_avatar( $userdata->ID, 46 );	
	      echo 'Logged in as ' . $current_user->nickname . "\n";
echo '</a></div></div>';
										}
									?>
			<ul id="sidebar">
			
			
			
				<li class="widget avatarbio">
					<h2 class="widgettitle">&nbsp;</h2>
				<div><?php echo get_avatar( $curauth->ID, $size = '380' ); 
   ?></div><p><?php echo $curauth->description; ?></p><p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>

   	
   		<?php
			if( is_user_logged_in() ) {
				    echo '<p><a title="Contact by email" alt="Email" class="mpix medlarge nounderline shadowlight" href="mailto:';
				    echo $curauth->user_email;
				    echo '">m</a></p>';
			}
		?>



				</li>

<?php if ( is_user_logged_in() ) { ?>
				<li class="widget absences">
				<h2 class="widgettitle">Absences </h2>
						<ul>							
							<!-- Absences queries -->
							<?php
							
							// Consider whether to get by category
							$the_query = new WP_Query( 'post_type=absences' );
							
								// The Loop
								while ( $the_query->have_posts() ) : $the_query->the_post();
								
									$terms = strip_tags( get_the_term_list($post->ID, 'status', '', ' ', '') );
									$termsstrip = strtolower($terms);
									
									if ($post->post_author == $curauth->ID) {

										echo '<li id="', the_ID(), '" class="', $termsstrip , '">';
										echo '<span class="pictogramfont">';
											if($termsstrip == 'excused') { 
												echo 'x'; 
											} else if($termsstrip == 'late')  { 
											echo '{'; 
											} else { 
											echo 'x'; 
											}
										echo '</span><strong>';
										echo ff_rel_time(); 
										echo '</strong><p class="clearboth indent">';
										echo the_title();
										echo '</p></li>';
										$absences = true;
									} else {
									
										
									}
					 			endwhile;
								
									if ($absences == false) {

										echo '<li><p style="clear: left;">';
										echo 'None</p></li>';
										$absences == true;
									} 								
								// Reset Post Data
								wp_reset_postdata();
							?>			
						</ul>
				</li>
							<?php } ?>
								
								
								
								
								

				<?php get_sidebar(); ?>

			</ul>
	</div>
</div>


</div>

<?php get_footer(); ?>
</body>
</html>
