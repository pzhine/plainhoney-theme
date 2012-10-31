<?php

include(TEMPLATEPATH.'/options.php');

function plainhoney_get_smallest_attachment($images) {
	$smallest = $images[0];
	foreach( $images as $image ) {
		if( str_ireplace(' kb','', $image['filesize']) < str_ireplace(' kb','', $smallest['filesize']) ) {
			$smallest = $image;
		}
	}
	return $smallest;
}

function plainhoney_remove_images( $content ) {
   $content = preg_replace('/<a[^>].*?<img[^>].*?<\/a>/s','', $content);
   $content = preg_replace('/<img[^>]+./','', $content);
   return $content;
}

function plainhoney_page_nav() {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="pagenav">
			<div class="nextpage"><?php next_posts_link( 'Older pollen &raquo;' ); ?></div>
			<div class="prevpage"><?php previous_posts_link( '&laquo; Newer pollen' ); ?></div>
		</div>
	<?php endif;
}

function plainhoney_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
  include 'views/comment.php';
}

function plainhoney_endsign( $content ) {
  return preg_replace('/(.*)\s*<\/p>/s','$1<span class="endsign"></span></p>', $content);
  $cutat = strrpos($content, '</p>');
  if( $cutat === FALSE ) {
    $cutat = strrpos($content, '.</P>');
  }
  if( $cutat !== FALSE ) {
    $content = substr($content, 0, $cutat) . '<span class="endsign"></span></p>';
  }
  return $content;
}

?>