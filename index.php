<?php

// Autoloader. Use SPL in a real project.
foreach(array('Server', 'Stats', 'StatsException') as $file) {
	include sprintf('./MCServerStatus/Minecraft/%s.php', $file);
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Welcome to Josephland!</title>
	<style>
	  html { 
      background: url(background.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
	    font-family: "Helvetica Neue", "Helvetica", "Segoe UI", "Ubuntu Sans", sans-serif;
    }
	  h1, h2 {
	    text-align: center;
	  }
	  h2 {
	    margin: 0;
	  }
	</style>
</head>
<body>
  <h1><img src="/title.png" alt="Welcome to Josephland!"/></h1>
  <h2><img src="/subtitle1.png" alt="Vanilla Minecraft server @"/><img src="/subtitle2.png" alt="joseph.renton.es"/></h2>
  <h2><img src="/Status.png" alt="Status:"/>
    <?php 
    try {    
      $stats = \Minecraft\Stats::retrieve(new \Minecraft\Server("joseph.renton.es"));
    } catch (Exception $e) {
      $stats = null;
    }
    if(!is_null($stats) and $stats->is_online): ?>
		<img src="/ONLINE.png" alt="ONLINE"/><img src="/<?php printf('%u', $stats->online_players); ?>.png" /><img src="/players-online.png" alt="players online"/>
		<?php else: ?>
		<img src="/OFFLINE.png" alt="OFFLINE"/>
		<?php endif; ?>
	</h2>
  <h2 style="margin-top:2em"><img src="/Aerial-Tour.png" alt="Aerial-Tour.png"/></h2>
	<iframe src="https://player.vimeo.com/video/126979754?title=0&byline=0&portrait=0" width="800" height="449" style="display:block; margin: 1em auto;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<iframe src="https://player.vimeo.com/video/145789956?title=0&byline=0&portrait=0" width="800" height="640" style="display:block; margin: 1em auto;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
  <?php if(!is_null($stats) and $stats->is_online): ?>
  <h2 style="margin-top:2em"><img src="/DynMap.png" alt="DynMap"/></h2>
	<iframe src="http://joseph.renton.es:8123/?zoom=4&mapname=surface&x=366&y=65&z=580" style="display:block; height:40em; width:70%; margin: 1em auto;"></iframe>
  <?php endif; ?>
</body>
</html>
