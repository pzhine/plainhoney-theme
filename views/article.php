<div class="article">
	<h1><?php the_title() ?></h3>
	<h2>
		<!-- by <a href="/<?php the_author_meta('user_login') ?>">
			<?php the_author_meta('display_name') ?>
		</a> -->
		by <?php the_author_meta('display_name') ?>
		|
		pollinated under
		<?php the_category(', ') ?>
	</h2>
	<?php the_content() ?>
</div>