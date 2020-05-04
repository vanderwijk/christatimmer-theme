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

						<?php the_content(); ?>

						<?php if ( !rcp_user_has_active_membership() && ( !current_user_can( 'edit_others_pages' ) ) ) {
							if ( has_post_thumbnail() ) {
								echo '<p><a href="/abonnement/">';
								the_post_thumbnail();
								echo '</a></p>';
							} ?>
							<p>Om deze video te bekijken heb je een abonnement nodig. Voor slechts &euro; 7,95 per maand krijg je toegang tot alle video's. Heb je al een abonnement? <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Log in">Log dan in</a> om de video te bekijken.</p>
							<p class="center">
								<a href="/abonnement/" class="call-to-action">
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