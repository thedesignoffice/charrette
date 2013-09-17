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
								echo get_avatar( $user->ID, 60 );

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
