<?php
add_filter( 'the_content', 'plainhoney_remove_images', 100 );
add_filter( 'the_content', 'plainhoney_add_comments_links', 100 );
?>
<?php if ( have_posts() ) : ?>
	<ul class="excerptlist">
		<?php while ( have_posts() ) : the_post();
      $is_singleton = get_post_meta(get_the_ID(), 'plainhoney_is_singleton', true);
      if( $is_singleton && $wp_query->query_vars['cat'] > 0 ) { continue; } ?>
		<li>
			<h3>
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h3>
			<h4>
				<!-- by <a href="/<?php the_author_meta('user_login') ?>">
					<?php the_author_meta('display_name') ?>
				</a> -->
				by <?php the_author_meta('display_name') ?>
        <?php if ($wp_query->query_vars['cat'] == 0) : ?>
				|
				pollinated under
				<?php
        $postcats = get_the_category();
        if( $is_singleton ) {
          $parent = get_category($postcats[0]->category_parent);
        ?>
        <a class="category" href="/combs/<?php echo $parent->slug ?>"><?php echo strtolower($parent->name) ?></a>
        <?php
        } else {
          for( $i=0; $i < count($postcats); $i++ ) {
            $cat = $postcats[$i];
            $d = ', ';
            if( $i == count($postcats) - 1 ) {
              $d = '';
            }
            if( $i == count($postcats) - 2 ) {
              $d = ' & ';
            }
          ?>
          <a class="category" href="/combs/<?php echo $cat->slug ?>"><?php echo strtolower($cat->name) ?></a><?php echo $d ?>
          <?php
          }
        }
        endif;
        ?>
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
				
                <?php the_content('__MORELINK__') ?> 
                
			</div>
		</li>
		<?php endwhile; ?>
	</ul>
  <?php plainhoney_page_nav(); ?>
<?php else : //have_posts ?>
	No pollen yet :(
<?php endif; //have_posts  ?>
<?php remove_filter( 'the_content', 'plainhoney_remove_images' ); ?>