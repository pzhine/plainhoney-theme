<div class="page">
	<h1><?php the_title() ?></h3>
	<div class="intro">
		<?php the_content() ?>
	</div>
    <?php
        $categories = get_categories(array('parent'=>0, 'hide_empty'=>0, 'exclude'=>'1'));
        foreach( $categories as $category ) :
            if( strlen($category->description) == 0 ) { continue; } 
            $firstWord = strstr($category->description, ' ', true);
            $description = strstr($category->description, ' '); ?>
        <p>
            <a class="comb-link" href="/hive/<?php echo $category->slug ?>"><?php echo strtoupper($firstWord) ?></a>
            <?php echo $description; ?>
        </p>
    <?php endforeach; ?>
    
</div>