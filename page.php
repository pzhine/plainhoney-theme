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
		
		<meta property="og:title" content="<?php the_title() ?>" />
		<meta property="og:image" content="<?php echo get_bloginfo('template_directory') ?>/images/logo.png" />
		<meta property="og:url" content="<?php echo site_url(get_query_var('name')) ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="Plain Honey" />
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
			'css/page.css',
            'css/footer.css'
		  )
		), get_bloginfo('template_directory').'/');  ?>
	</head>
	<body class="post">
		<div class="wrapper">
			<?php include('views/header.php'); ?>
			<?php include('views/category-leftcol.php'); ?>
			
			<div class="content">
      
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php include('views/page-'.get_query_var('name').'.php'); ?>
				<?php endwhile; ?>
			</div>
			<?php include('views/post-rightcombs.php'); ?>
			<?php //get_sidebar(); ?>
			<?php get_footer(); ?>
		</div>
	</body>
</html>