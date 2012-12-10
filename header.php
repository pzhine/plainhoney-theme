<?php
  require_once 'lib/squishem.php';
?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged, $category, $category_title;

    if ( is_home() || is_front_page() ) {
        bloginfo( 'name' );
    } elseif( is_category() ) {
        $category = get_category( $wp_query->query_vars['cat'] );
        $category_title = $category->name;
        if( $category->parent != 0 ) {
            $category_title = get_category_parents($category->parent, false, ' > ');
        }
        echo $category_title;
    } else {
        wp_title('');
    }

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
	
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/images/favicon.ico"/>

<?php wp_head(); ?>