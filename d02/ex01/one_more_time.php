#!/usr/bin/php
<?PHP
$month = array(
	1 => "janvier",
	2 => "février",
	3 => "mars",
	4 => "avril",
	5 => "mai",
	6 => "juin",
	7 => "juillet",
	8 => "aout",
	9 => "septembre",
	10 => "octobre",
	11 => "novembre",
	12 => "décembre");

$week = array(
	1 => "lundi",
	2 => "mardi",
	3 => "mercredi",
	4 => "jeudi",
	5 => "vendredi",
	6 => "samedi",
	7 => "dimanche");

if ($argc < 2)
	exit();
date_default_timezone_set("Europe/Paris");
$inputs = explode(" ", $argv[1]);
if (count($inputs) != 5 ||
preg_match("/^[1-9]$|0[1-9]|[1-2][0-9]|3[0-1]$/", $inputs[1], $inputs[1]) === 0 ||
preg_match("/^[0-9]{4}$/", $inputs[3], $inputs[3]) === 0 ||
preg_match("/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $inputs[4], $inputs[4]) === 0){
	print "Wrong Format\n";
	exit();
}
$inputs[0] = array_search(lcfirst($inputs[0]), $week);
$inputs[2] = array_search(lcfirst($inputs[2]), $month);
if ($inputs[0] === false || $inputs[2] === false){
	print "Wrong Format\n";
	exit();
}
$time = mktime($inputs[4][1], $inputs[4][2], $inputs[4][3], $inputs[2], $inputs[1][0], $inputs[3][0]);
if (date("N", $time) == $inputs[0])
print $time."\n";
else
	print "Wrong Format\n";

?>