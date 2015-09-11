<li class="widget" id="classroom">
	<h2 class="widgettitle">Classroom</h2>

	<table class="usertable">

		<?php
			//displays all users with their avatar and their posts (titles)
			$blogusers = get_users_of_blog();

			if ($blogusers) {
				foreach ($blogusers as $bloguser) {
				$user = get_userdata($bloguser->user_id);

				echo '<tr><td><div class="imgwrap"><a href="/?author=' . $user->ID . '">';
				echo get_avatar( $user->ID, 60 );

				echo '</a></div></td><td><a href="/?author=' . $user->ID . '">' . $user->user_firstname . ' ' . $user->user_lastname . '</a></td><td>';

				if( is_user_logged_in() ) {
							echo '<a title="Contact by email" alt="Email" class="mpix smallmed nounderline shadowlight" href="mailto:';
							echo $user->user_email;
							echo '">m</a>';
					}
				echo '</td></tr>';


				wp_reset_query();  // Restore global post data stomped by the_post().
				}
			}
			?>
		</table>


</li>


<?php if ( !function_exists('dynamic_sidebar')
		|| !dynamic_sidebar() ) : ?>
	<li></li>
<?php endif; ?>

<li class="widget">
	<h2 class="widgettitle">About</h2>
	<p class="gray"><?php bloginfo( 'description' ); ?></p>
</li>
