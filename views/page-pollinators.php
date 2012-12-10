<div class="page">
	<h1><?php the_title() ?></h3>
	<div class="intro">
		<?php the_content() ?>
	</div>
    <?php
        $users = get_users(array('orderby'=>'display_name', 'order'=>'ASC', 'exclude'=>0));
        foreach( $users as $user ) :
            $description = get_the_author_meta('description', $user->ID);
            if( strlen($description) == 0 ) { continue; } 
            ?>
        <p>
            <strong><?php echo $user->display_name ?></strong>
            <?php echo $description; ?>
        </p>
    <?php endforeach; ?>
    
</div>