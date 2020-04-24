<?php get_header(); ?>

<div class="row intro">
	<div class="col">
		<div class="block">
			<h1 class="category-title"><?php _e('All', 'fran'); ?> <?php post_type_archive_title(); ?></h1>
			<?php echo category_description(); ?>
		</div>
	</div>
</div>

<div class="row content">
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_type() );
				endwhile;
			else :
				get_template_part( 'content', 'none' );
			endif;
		?>
</div>

<?php get_template_part( 'module-pagination', get_post_format() ); ?>

<?php get_template_part( 'module-call-to-action', get_post_format() ); ?>

<?php get_footer();