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
		
		<meta property="og:title" content="Plain Honey | Page not found" />
       
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
			'css/header.css',
			'css/breadcrumbs.css',
			'css/leftcol.css',
			'css/leftcombs.css',
			'css/rightcombs.css',
			'css/comb.css',
			'css/article.css',
      'css/comments.css',
      'css/footer.css'
		  )
		), get_bloginfo('template_directory').'/');  ?>
	</head>
	<body class="post">
		<div class="wrapper">
			<?php
				$category = get_the_category();
				$category = $category[0];
        $postid = get_the_ID();
			?>
			<?php include('views/header.php'); ?>
			<?php include('views/category-leftcol.php'); ?>
			
			<div class="content">
                <div class="article">
                    <h1>Page not found</h1>
                    <h2>Sorry, the page you are trying to reach does not exist.</h2>
                </div>
				
				
			</div>
			<?php include('views/post-rightcombs.php'); ?>
			<?php //get_sidebar(); ?>
			<?php get_footer(); ?>
		</div>
	</body>
</html>