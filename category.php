<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

	<head>
		<?php global $category, $category_title; 
        get_header(); ?>
        
        <?php
            $categories = get_categories(array('parent'=>$category->cat_ID, 'hide_empty'=>0));

            if( count($posts) > 0 ) {
                $is_singleton = get_post_meta($posts[0]->ID, 'plainhoney_is_singleton', true);
                if( $is_singleton && count($categories)==0 ) {
                  header('Location: '.get_permalink($posts[0]->ID));
                }
            }
        ?>
		
		<meta property="og:title" content="<?php echo $category_title ?>" />
		<meta property="og:image" content="<?php echo get_bloginfo('template_directory') ?>/images/logo.png" />
		<meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo site_url('combs/'.$category->slug) ?>" />
		<meta property="og:site_name" content="Plain Honey" />
		<meta property="og:description"
			  content="Plain honey is a hive of essays, stories, and discussions."/>
		
		<?php squishem(array(
		  'js' => array(
			'js/jquery.js', 
			'js/jquery.widgets.js', 
			'js/HexLayout.js',
			'js/combs.js'
		  ),      
		  'css' => array(
			'css/reset.css', 
			'css/fonts.css', 
			'css/layout.css', 
			'css/category.css', 
			'css/header.css',
			'css/breadcrumbs.css',
			'css/leftcol.css',
			'css/leftcombs.css',
			'css/rightcombs.css',
			'css/hivenav.css',
			'css/excerptlist.css',
			'css/comb.css',
			'css/footer.css'
		  )
		), get_bloginfo('template_directory').'/');  ?>
		
	</head>
	<body class="category">
		<div class="wrapper">
			<?php include('views/header.php'); ?>
			<?php include('views/category-leftcol.php'); ?>
			
			<div class="content <?php echo (count($categories) == 0)?'nocategories':'' ?>">
				
				<?php include('views/category-breadcrumbs.php'); ?>		
				
				<?php if( count($categories) > 0 ) { ?>
					<?php include('views/category-hivenav.php'); ?>		
					<?php include('views/category-rightcombs.php'); ?>
				<?php } ?>
			
				<?php include('views/excerptlist.php'); ?>
				
			</div>
			<?php if( count($categories) == 0 ) {
				include('views/post-rightcombs.php');
			} ?>
			<?php //get_sidebar(); ?>
			<?php get_footer(); ?>
		</div>
	</body>
</html>