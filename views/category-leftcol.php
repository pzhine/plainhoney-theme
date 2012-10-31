<div class="leftcol">
	<?php if( $category->parent != 0 ) {
		$parentcat = get_category($category->parent); ?>
		<a class="parentcat" href="/hive/<?php echo $parentcat->slug ?>">
			More <?php echo $parentcat->name ?>
		</a>
	<?php } ?>
	<ul>
		<?php
			$subcategories = get_categories(array(
				'parent'=>$category->parent, 
				'hide_empty'=>0,
				'exclude'=>'1'
			));
			foreach( $subcategories as $subcat ) { ?>
				<?php if( $category->parent != 0 && $subcat->cat_ID==$category->cat_ID ) { continue; } ?>
				<li <?php echo ($subcat->cat_ID==$category->cat_ID)?'class="active"':'' ?>>
					<a href="/hive/<?php echo $subcat->slug ?>">
						<?php echo $subcat->name ?> 
					</a>
				</li>
			<?php } ?>
	</ul>
	<div class="thinline"></div>
	<?php include('leftcol-footlinks.php') ?>
	<?php include('leftcombs.php') ?>
</div>