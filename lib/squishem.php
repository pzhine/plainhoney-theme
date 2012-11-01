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
    $base = preg_replace('/http:\/\/[^\/]+\//','',$basedir);
    $base = preg_replace('/(.*)\//','$1',$base);
    foreach( $resources['css'] as $key=>$val ) {
      $css[] = str_replace('css/','', str_replace('.css','',$val));
    }
    foreach( $resources['js'] as $key=>$val ) {
      $js[] = str_replace('js/','', str_replace('.js','',$val));
    }
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $basedir ?>min/?t=css&f=<?php echo implode($css,',')?>&b=<?php echo $base; ?>">
    <script type="text/javascript" src="<?php echo $basedir ?>min/?t=js&f=<?php echo implode($js,',')?>&b=<?php echo $base; ?>"></script>
    <?php
  }
}

?>