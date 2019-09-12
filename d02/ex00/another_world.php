#!/usr/bin/php
<?PHP
if ($argc > 1)
	print trim(preg_replace("/[ \t]+/", " ", $argv[1]))."\n";
?>