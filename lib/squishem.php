<?php

function squishem($resources, $basedir='', $debug=true) {
  if( (strpos($_SERVER['REMOTE_HOST'], 'local') !== FALSE 
  || $_SERVER['REMOTE_HOST'] == '127.0.0.1'
  || $_GET['debug'] !== NULL 
  || $debug) && $_GET['testsquish'] === NULL ) {
    foreach( $resources['js'] as $key=>$val ) {
      $res = $basedir.str_replace('//','/', $val);
	  $resources['js'][$key] = $res;
      ?>
        <script type="text/javascript" src="<?php echo $res ?>"></script>
      <?php
    }
    foreach( $resources['css'] as $key=>$val ) {
      $res = $basedir.str_replace('//','/', $val);
	  $resources['css'][$key] = $res;
      ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $res ?>">
      <?php
    }
    
  } else {
	/*
	$basedir = str_replace(get_bloginfo('url'), '', $basedir);
	foreach( $resources['js'] as $key=>$val ) {
		$resources['js'][$key] = $basedir.$val;
	}
	foreach( $resources['css'] as $key=>$val ) {
		$resources['css'][$key] = $basedir.$val;
	}
	*/
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $basedir ?>min/?f=<?php echo implode($resources['css'],',')?>">
    <script type="text/javascript" src="<?php echo $basedir ?>min/?f=<?php echo implode($resources['js'],',')?>"></script>
    <?php
  }
}

?>