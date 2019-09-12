#!/usr/bin/php
<?PHP

if ($argc != 2 || !file_exists($argv[1]))
	exit();

$fd = fopen($argv[1], 'r');
$line = "";
while (!feof($fd)){
	$line .= fgets($fd);
}

$line = preg_replace_callback("/(<link|<a )(.*?)(>)(.*)(<\/a>|\/>)/si",
	function ($row){
		$row[0] = preg_replace_callback("/( title=\")(.*?)(\")/mi",
			function($found){
				return ($found[1]."".strtoupper($found[2])."".$found[3]);
		}, $row[0]);
		$row[0] = preg_replace_callback("/(>)(.*?)(<)/si",
			function($row){
            	return ($row[1]."".strtoupper($row[2])."".$row[3]);
        }, $row[0]);
        return ($row[0]);
	}, $line);
	print $line;
	fclose($fd);
?>
