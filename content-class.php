<?php if ( is_archive() ) { // Archive ?>

			<div class="col one-third">
				<div <?php post_class( 'block' ); ?>>

					<?php if ( has_post_thumbnail ( $post ->ID ) ) { ?>
						<div class="thumbnail">
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post ->ID ), 'single' ); ?>
								<img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
							</a>
						</div>
					<?php }; ?>

					<div class="entry-meta">
						<span class="date updated"><?php the_time( get_option( 'date_format' ) ); ?></span>
						<span class="vcard author">
							<?php _e( 'by', 'fran' ); ?>
							<span class="fn"><?php the_author(); ?></span>
						</span>
					</div>

					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h2>

					<div class="entry-content">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php the_excerpt(); ?>
						</a>
					</div>

					<?php if ( !is_tax() ) { // Archive ?>
						<div class="entry-footer">
							<?php get_template_part( 'module-categories', get_post_format() ); ?>
						</div>
					<?php } ?>

				</div>
			</div>

<?php } else { // Single ?>

			<div class="col">
				<div <?php post_class( 'block' ); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-meta">
						<span class="date updated"><?php the_time( get_option( 'date_format' ) ); ?></span>
						<span class="vcard author">
							<?php _e( 'by', 'fran' ); ?>
							<span class="fn"><?php the_author(); ?></span>
						</span>
					</div>

					<div class="entry-content clearfix">

					<?php if ( trial_active() ) {
						echo 'trial';
					} ; ?>

						<?php if (false) {
							the_content();
						} else { 
							if ( has_post_thumbnail() ) {
								echo '<p>';
								the_post_thumbnail();
								echo '</p>';
							} ?>
							
							<?php if ( has_term( 14, 'course' ) ) { ?>

								<p>Meld je gratis aan om deze video te bekijken. Je krijgt dan 30 dagen lang toegang tot alle video's van deze lessenreeks. Heb je al een abonnement? <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Log in">Log dan in</a> om de video te bekijken.</p>

							<?php } else { ?>

								<p>Om deze video te bekijken heb je een abonnement nodig. Voor slechts &euro; 5,95 krijg je 30 dagen lang toegang tot alle video's van deze lessenreeks. Heb je al een abonnement? <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Log in">Log dan in</a> om de video te bekijken.</p>

							<?php } ?>

							<?php $subscription = 0;
							if ( has_term( 8, 'course' ) ) { // Bikini Workout
								$subscription = 1;
							} else if ( has_term( 9, 'course' ) ) { // Pilates Balans en Kracht
								$subscription = 2;
							} else if ( has_term( 13, 'course' ) ) { // Pilates Balans en Kracht
								$subscription = 4;
							} else if ( has_term( 14, 'course' ) ) { // Pilates Balans en Kracht
								$subscription = 5;
							} else if ( has_term( 10, 'course' ) ) { // Power Pilates
								$subscription = 3;
							} ?>

							<p class="center">
								<a href="/abonnement/registreren/?action=registeruser&amp;subscription=<?php echo $subscription; ?>" class="call-to-action">
									Meld je nu aan!
								</a>
							</p>
						<?php } ?>

					</div>
					<div class="entry-footer clearfix">
<?php get_template_part( 'module-categories', get_post_format() ); ?>
<?php get_template_part( 'module-sharing', get_post_format() ); ?>
					</div>
				</div>
			</div>

<?php } ?>