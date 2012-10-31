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
		<?php get_header(); ?>
		
		<meta property="og:title" content="Plain Honey" />
		<meta property="og:image" content="http://www.plainhoney.com/images/logo.png" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.plainhoney.com" />
		<meta property="og:site_name" content="Plain Honey" />
		<meta property="og:description"
			  content="Plain honey is a hive of essays, stories, and discussions."/>
		
		<?php squishem(array(
		  'js' => array(
			'//js/jquery.js', 
			'//js/jquery.widgets.js', 
			'//js/HexLayout.js',
			'//js/combs.js'
		  ),      
		  'css' => array(
			'//css/reset.css', 
			'//css/fonts.css', 
			'//css/layout.css', 
			'//css/category.css', 
			'//css/header.css',
			'//css/breadcrumbs.css',
			'//css/leftcol.css',
			'//css/leftcombs.css',
			'//css/rightcombs.css',
			'//css/hivenav.css',
			'//css/excerptlist.css',
			'//css/comb.css'
		  )
		), get_bloginfo('template_directory').'/');  ?>
		
	</head>
	<body class="category">
		<div class="wrapper">
			<?php $category = get_category( $wp_query->query_vars['cat'] ); ?>
		
			<?php include('views/header.php'); ?>
			<?php include('views/category-leftcol.php'); ?>
			
			<?php $categories = get_categories(array('parent'=>$category->cat_ID, 'hide_empty'=>0)); ?>
			
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