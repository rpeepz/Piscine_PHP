#!/usr/bin/php
<?php
if ($argc == 2) {
	$user_agent = "Mozilla/5.0 (X11; U; Linux x86_64; de; rv:1.9.2.8) Gecko/20100723 Ubuntu/10.04 (lucid) Firefox/3.6.8";
	
	//init curl handle "ch" and set options
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $argv[1]);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

	//header info for deubbing
	// curl_setopt($ch, CURLOPT_HEADER, 1);

	$buffer = curl_exec($ch);
	curl_close($ch);
	if (empty($buffer)) {
		print "Nothing returned from url"."\n";
		return;
	}
	preg_match("/^((http[s]?|ftp):\/)?\/?([^:\/\s]+)(|(\/[^*]+))/m", $argv[1], $path);
	if (is_dir($path[3]) === false) {
		mkdir($path[3]);
	}
	preg_match_all("/(\<img.+?(src\=\")([^\"]*\.(?:gif|jpg|jpeg|png|svg)))/im", $buffer, $matches);
	$photo = [];
	foreach ($matches[3] as $link) {
		if ($new = preg_replace("/^\//", $argv[1]."/", $link)){
			array_push($photo, $new);
		} else {
			array_push($photo, $link);
		}
	}
	foreach ($photo as $pic){
		print $pic."\n";
		preg_match("/[^\/]+$/m", $pic, $match);
		$file = fopen($path[3].'/'.$match[0], "w");
		$content = file_get_contents($pic);
		file_put_contents($path[3].'/'.$match[0], $content);
		fclose($file);
	}
} else {
	$arg = $argc - 1;
	print "There can be only one argument you have ".$arg."\n";
}