<?php get_header(); ?>
<!-- JQuery on page effects -->
<script type="text/javascript">

			function showonlyone(thechosenone) {
			     $('div[name|="pane"]').each(function(index) {
			          if ($(this).attr("id") == thechosenone) {
			          		$(".filternav a").removeClass("active");
			          		$("#"+thechosenone+"id").addClass("active");

			               $(this).fadeIn(150);
			          }
			          else {
			               $(this).fadeOut(150);
			          }
			     });
			}


   </script>


<div class="inner-wrapper" id="global">

<div class="line">
	<div class="unit size3of4">

						<div class="masthead" ><?php bloginfo( 'name' ); ?>
						 
								<?php
									if( is_user_logged_in() ) {
										echo '<span class="grey small"></span>';
									} else {
										echo '<a id="" title="Log in" href="/wp-admin/" class=""><span class="grey small">Log in</span></a>';
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
						<div class="filtercontrols">
							<ul>
									<li class="expanded" title="Expanded view">&#202;</li><li class="contracted" title="Contracted view">&#194;</li>

							</ul>
						</div>
						<div class="filternav" id="maintabs">
							<ul>
								<li><a id="newsid" href="javascript:showonlyone('news');" title="View Latest Activity" class="active">Latest</a></li>
								<li><a class="" id="outlineid" href="javascript:showonlyone('outline');" title="View Course Outline">Outline</a></li>
								<li><a id="assignmentsid" href="javascript:showonlyone('assignments');" title="View Only Assignments" class="">Assignments</a></li>
								<li><a class="" id="linkstextsid" href="javascript:showonlyone('linkstexts');" title="View Links & Media Resources">Resources</a></li>
								<li><a id="peopleid" title="View by People" href="javascript:showonlyone('people');" class="mpix">f</a></li>
							</ul>
						</div>

		<?php if ( have_posts() ) : ?>                

		<div id="news" name="pane" class="index">

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
							<div class="hiddendrawer lastrow " style="display: none" id="postcontent-<?php the_ID(); ?>">
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
		   ?></a><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  <a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>" class="grey lucida marginleft10"><?php echo ff_rel_time(); /*the_time( get_option( 'date_format' ) );*/ ?></a></h2></div>
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
							 &nbsp; &nbsp;<?php edit_post_link('<span class="spot right">r</span>'); ?>	&nbsp;&nbsp;
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
					endif;
				?>
				<div class="navigation"><p class="nav-previous"><?php posts_nav_link(); ?></p></div>
		</div>
		



		<!-- Begin assignments tab -->
		<!-- Begin assignments tab -->
		<!-- Begin assignments tab -->
		<!-- Begin assignments tab -->
		<!-- Begin assignments tab -->
		<div id="assignments" name="pane" class="index" style="display:none;">
					<!-- this is our loop -->

			<?php
			// The Query
			query_posts( 'posts_per_page=1000' );

			// The Loop
			while ( have_posts() ) : the_post(); ?>
						<?php  if (in_category( array( 'Homework', 'Assignments', 'Assignment'))) { ?>

							<div class="row-wrapper ">
								<div class="line lastrow ">
									<div class="unit size1of1 lastunit homework">
										

										<div style="float: right;"><div class="lucida grey" style="display: inline-block"><?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?></div><?php edit_post_link('<span class="marginleft10">r</span>'); ?><a class="marginleft10" href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a>
<a title="Click to hide/display" class="slidelink" onclick="toggleAssignment(<?php the_ID(); ?>)"></div><h2><span>&#237;</span> <?php the_title(); ?></a><div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();  ?></a>
										
											
										
										</div></h2>
										<div class="hiddendrawer" id="postassignment-<?php the_ID(); ?>"><?php the_content(); ?><p class="lucida"><span>f</span> <?php the_author_posts_link(); ?></p> </div>
									</div>
				
								</div>
							</div>
							<?php } ?>
			<? endwhile;

			// Reset Query
			wp_reset_query();
			?>

		</div>



		<!-- Begin outlne tab -->
		<!-- Begin outlne tab -->
		<!-- Begin outlne tab -->
		<!-- Begin outlne tab -->
		<!-- Begin outlne tab -->
		<div id="outline" name="pane" class="index" style="display: none;">
		
			
			<?php
			// displays all category titles, descriptions and number of posts that are children of the Outline category
			
			// get the ID of the category Outline
			$parentcat = get_category_by_slug('outline');
			$parentcat = $parentcat->cat_ID;
			
			
			$taxonomy = 'category';
			$param_type = 'category__in';
			$term_args=array(
			  'type' => 'post',
			  'child_of' => $parentcat,
			  'show_count'  => 1,
			  'orderby' => 'slug',
			  'order' => 'ASC'
			);
			$terms = get_terms($taxonomy,$term_args);
			if ($terms) {
			  foreach( $terms as $term ) {
			    $args=array(
			      "$param_type" => array($term->term_id),
			      'post_type' => 'post',
			      'post_status' => 'publish',
			      'posts_per_page' => -1,
			      'caller_get_posts'=> 1,
			      'order' => 'ASC'
			      );
			    $my_query = null;
			    $my_query = new WP_Query($args);
			    if( $my_query->have_posts() ) {  ?>
			  	<div class="row-wrapper">
			    	<div class="line">  
			      		<div class="unit size1of5 " style="margin-right: 0px;">
			      		&nbsp;
			      		</div>
					  	<div class="unit size4of5 lastUnit">
					    	<h2><?php echo '<a href="/?cat=' . $term->term_id . '">' . $term->name . '</a>';?></h2>
					    		<p style="margin: 0 40px 10px 0;"><?php echo $term->description; ?> </p>
						</div>

					  	<div class="unit size1of1 hiddendrawer lastUnit" id="content">
					    	<?php
					    	//echo 'List of Posts for ' . $category->name;
							echo '<table>';
					  		while ($my_query->have_posts()) : $my_query->the_post(); ?>


					    		<tr>
								<td width="20%">
									<?
									//display today and yesterday instead of date when applicable
									echo ff_rel_time();
									?>
								</td>
								<td width="60%">
									<h4>
									
								<?php  if (in_category( array( 'Link', 'Links'))) { ?>
									<a  target="_new" href="<?php echo get_the_content(); ?>"><span style="font-family: charretteregular; font-size: 18px; padding-left: 0;">w</span>  
									
								<?php } else if (in_category( array( 'Bibliography', 'Reference', 'Reading', 'Readings'))) { ?>
									
									<a href="<?php the_permalink() ?>" target="_new" rel="bookmark" title="<?php
   if (function_exists('has_excerpt') && has_excerpt()) the_excerpt();
?>"><span style="font-family: charretteregular; font-size: 18px; padding-left: 0;">B</span>  
									
								<?php 	} else {  ?>
									<a href="<?php the_permalink() ?>"  target="_new" rel="bookmark" title="<?php
   if (function_exists('has_excerpt') && has_excerpt()) the_excerpt();
?>">
									
								<?php 	} ?>
										<?php the_title(); ?></a><span class="lucida grey"><?php the_author_posts_link(); ?></span>
									</h4>
								</td>
								<td width="20%" class="pictogramfont lasttd">
									<span class="lucida grey"><?php if (function_exists('has_excerpt') && has_excerpt()) the_excerpt(); ?><?php $today ?></span> <?php comments_number('', '<span>1</span> b', '<span>%</span> b'); ?>
								</td>
							</tr>
					   		<?php
					  		endwhile;
					  		?>
					  		</table>
						</div>
						<div class="line hiddendrawer">
							<div class="unit size1of5 " style="margin-right: 0px;">
			      			&nbsp;
			      			</div>
					  		<div class="unit size4of5 lastUnit">
					    		<p><?php echo $term->count;?> posts</p>
							</div>
							
						</div>
			    	</div>
			  	
				</div>
			 	<?php
			    }
			  }
			}
			wp_reset_query();  // Restore global post data stomped by the_post().
			?>


		</div>
		<!-- End outlne tab -->
			



		<!-- Begin Resources tab -->
		<!-- Begin Resources tab -->
		<!-- Begin Resources tab -->
		<!-- Begin Resources tab -->
		<!-- Begin Resources tab -->
		<div id="linkstexts" name="pane" class="index" style="display:none;">
					<!-- this is our loop -->

			<?php
			// The Query
			wp_reset_query();
			query_posts( 'posts_per_page=500' );

			// The Loop
			while ( have_posts() ) : the_post(); ?>
						

				<?php if (in_category( array( 'Link','Links'))) { ?>
	
				<div class="row-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 homework">
							<span style="float: right;"><?php edit_post_link('r'); ?>&nbsp;<a href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></span><h2><a href="<?php echo get_the_content(); ?>"><span>w</span> <?php the_title(); ?></a> <div class="grey lucida marginleft10"><?php echo ff_rel_time(); ?> </div></h2>
						</div>
	
					</div>					
				</div>					


				<?php } else if (in_category( array( 'Bibliography', 'Reference', 'Readings', 'Reading'))) { ?>
	
				<div class="row-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 homework">
							<span style="float: right;"><?php edit_post_link('r'); ?>&nbsp;<a href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></span><h2><a title="Click to slide down" class="slidelink" onclick="toggleResources(<?php the_ID(); ?>)"><span>B</span> <?php the_title(); ?></a><div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();/*the_time( get_option( 'date_format' ) );*/ ?></a></div></h2>
							<div class="hiddendrawer" style="display: none;" id="postresources-<?php the_ID(); ?>"><?php the_content(); ?><p class="lucida"><span>f</span> <?php the_author_posts_link(); ?></p> </div>
						</div>
	
					</div>					
				</div>					


				<?php } else if (in_category( array( 'Films', 'Movies', 'Video', 'Videos'))) { ?>
	
				<div class="row-wrapper">
					<div class="line lastrow">
						<div class="unit size1of1 homework">
							<span style="float: right;"><?php edit_post_link('r'); ?>&nbsp;<a href="<?php the_permalink(); ?>" title="Open in Own Page"><span>&#197;</span></a></span><h2><a title="Click to slide down" class="slidelink" onclick="toggleResources(<?php the_ID(); ?>)"><span>H</span> <?php the_title(); ?></a><div class="grey lucida marginleft10"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php echo ff_rel_time();/*the_time( get_option( 'date_format' ) );*/ ?></a></div></h2>
							<div class="hiddendrawer" style="display: none;" id="postresources-<?php the_ID(); ?>"><?php the_content(); ?><p class="lucida"><span>f</span> <?php the_author_posts_link(); ?></p> </div>
							<div class="unit size1of1 lastUnit lucida">
								
							</div>
						</div>
	
					</div>					
				</div>					



				<?php } ?>
			<? endwhile;

			// Reset Query
			wp_reset_query();
			?>

		</div>


		<!-- Begin people tab -->
		<!-- Begin people tab -->
		<!-- Begin people tab -->
		<!-- Begin people tab -->
		<!-- Begin people tab -->
		<div id="people" name="pane" class="index" style="display: none;">
			<?php
				//displays all users with their avatar and their posts (titles)
				$blogusers = get_users_of_blog();
				
				if ($blogusers) {
				  foreach ($blogusers as $bloguser) {
					$user = get_userdata($bloguser->user_id);
					
					
		
				//	echo get_avatar( $user->ID, 126 );
   
					echo '<div class="row-wrapper">';
					echo '		<div class="line">';
					echo '			<div class="unit size1of1 lastUnit">';
   
					echo '<a href="?author=' . $user->ID . '"><h2><div class="avatarcircle"  style="display: inline-block; margin: 0; margin-right: 15px; ">';
					echo get_avatar( $user->ID, 30 ); 
  					echo '</div>' . $user->nickname .'</h2></a>';

					$args=array(
					  'author' => $user->ID,
					  'post_type' => 'post',
					  'post_status' => 'publish',
					  'posts_per_page' => 1,
					  'caller_get_posts'=> 1
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					  //echo 'List of Posts for ' . user->user_firstname . ' ' . $user->user_lastname;
					  while ($my_query->have_posts()) : $my_query->the_post(); ?>
						
							<div class="hiddendrawer">	
							<?php  if (in_category('Links')) { ?>
	
					<h4><a href="<?php echo get_the_content(); ?>"><span class="pictograms">w</span> <?php the_title(); ?></a> <div class="grey lucida marginleft10"><?php echo ff_rel_time(); ?> </div></h4>
					
							<?php 	} else {  ?>
									<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_excerpt(); ?>"><?php the_title(); ?></a>  <div class="grey lucida marginleft10"><?php echo ff_rel_time(); ?> <?php comments_number('', '1 <span class="pictogramfont">b</span>', '% <span class="pictogramfont">b</span>'); ?></div></h4>
									<?php the_content(); ?> 
							<?php 	}  ?>
							</div>
					
						<?php
					  endwhile;
					}
						echo '</div>';
						echo '</div>';
						echo '</div>';

				  wp_reset_query();  // Restore global post data stomped by the_post().
				  }
				}
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
					<li></li>
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