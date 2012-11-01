<div class="article">
	<h1><?php the_title() ?></h3>
	<h2>
		<!-- by <a href="/<?php the_author_meta('user_login') ?>">
			<?php the_author_meta('display_name') ?>
		</a> -->
		by <?php the_author_meta('display_name') ?>
		|
		pollinated under
		<?php
      if( $is_singleton ) {
        $parent = get_category($category->category_parent);
      ?>
      <a href="/hive/<?php echo $parent->slug ?>"><?php echo $parent->name ?></a>
      <?php
      } else {
        the_category(', ');
      }
      ?>
	</h2>
  <?php add_filter( 'the_content', 'plainhoney_endsign', 100 ); ?>
	<?php the_content() ?>
  
  <?php comments_template( '/views/comments.php', false ); ?>
</div>