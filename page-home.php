<?php
/*
Template Name: Home
*/
get_header(); ?>

<div class="row content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="col">
		<div <?php post_class( 'block' ); ?>>
			<?php if ( has_post_thumbnail( $post -> ID ) ) { ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hero' ); 
				$thumb_img = get_post( get_post_thumbnail_id() );
				?>
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" itemprop="image" class="featured-image" />
			<?php }; ?>
			<div class="entry-content clearfix">
				<?php the_content(); ?>
			</div>
			<div class="entry-footer clearfix">
				<?php get_template_part( 'module-sharing', get_post_format() ); ?>
			</div>
		</div>
	</div>

	<?php endwhile;

	else :
		get_template_part( 'content', 'none' );
	endif; ?>
</div>

<div class="row recent">
	<div class="col">
		<div class="block">
		<h3><a href="/les/">Nieuwe lessen</a></h3>
		</div>
	</div>

	<?php query_posts( 'post_type=class&showposts=3' );
	while (have_posts()) : the_post(); ?>
	<div class="col one-third">
		<div class="block">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php if ( has_post_thumbnail( $post -> ID ) ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hero' ); 
					$thumb_img = get_post( get_post_thumbnail_id() ); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
				<?php }; ?>
				<h4><?php the_title(); ?></h4>
			</a>
		</div>
	</div>
	<?php endwhile;
	wp_reset_query(); ?>

</div>

<?php get_footer();