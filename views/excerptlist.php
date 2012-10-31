<?php
add_filter( 'the_content', 'plainhoney_remove_images', 100 );
?>
<?php if ( have_posts() ) : ?>
<?php 
	if( count($posts)==1 ) { 
		global $more;
		$more = 1;
	} ?>
	<ul class="excerptlist">
		<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<h3>
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h3>
			<h4>
				<!-- by <a href="/<?php the_author_meta('user_login') ?>">
					<?php the_author_meta('display_name') ?>
				</a> -->
				by <?php the_author_meta('display_name') ?>
				|
				pollinated under
				<?php the_category(', ') ?>
			</h4>
			<div class="excerpt">
				<?php 
					$images = attachments_get_attachments();
					if( count($images) > 0 ) {
						$image = plainhoney_get_smallest_attachment($images);
				?>
					<div class="media">
						<a href="<?php the_permalink() ?>" title="<?php echo $image['title'] ?>">
							<img src="<?php echo $image['location'] ?>" />
						</a>
					</div>
					<div style="clear:both"></div>
				<?php } ?>
				
				<?php the_content('Continue reading...') ?>
			</div>
		</li>
		<?php endwhile; ?>
	</ul>
<?php else : //have_posts ?>
	No pollen yet :(
<?php endif; //have_posts  ?>
<?php remove_filter( 'the_content', 'plainhoney_remove_images' ); ?>