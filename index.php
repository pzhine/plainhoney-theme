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
	<meta property="og:image" content="<?php echo get_bloginfo('template_directory') ?>/images/logo.png" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo site_url() ?>" />
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
        'css/header.css',
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
<body class="home"> 
	<div class="wrapper">
		<?php include('views/header.php'); ?>
		<?php include('views/leftcol.php'); ?>
		<div class="content">
			<?php include('views/hivenav.php'); ?>
			<?php include('views/excerptlist.php'); ?>
		</div>
		<?php //get_sidebar(); ?>
		<?php get_footer(); ?>
	</div>
  </body>
</html>
