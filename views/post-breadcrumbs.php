<ul class="breadcrumbs">
	<li><a href="/">Surface</a></li>
	<li>
		<?php 
			$the_categories = get_the_category();
			echo get_category_parents($the_categories[0], true, '</li><li>');
		?>
	</li>
</ul>	
				