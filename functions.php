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

?>