<ul class="breadcrumbs">
	<li><a href="/">Surface</a></li>
	<?php if( $category->parent != 0 ) : ?>
		<li>
			<?php echo get_category_parents($category->parent, true, '</li><li>') ?>
		</li>
	<?php endif; ?>
	<li><?php echo $category->name ?></li>
</ul>	