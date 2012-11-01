<ul class="breadcrumbs">
	<li><a href="/">Surface</a></li>
	<li>
		<?php 
			$the_categories = get_the_category();
			$crumbs = get_category_parents($the_categories[0], true, '</li><li>');
      
      if( $is_singleton ) {
        $pattern = '/<li><a[^>]*>'.get_the_title().'<\/a><\/li>/s';
        $crumbs = preg_replace($pattern, '', $crumbs);
      }
      echo $crumbs;
		?>
	</li>
</ul>	
				