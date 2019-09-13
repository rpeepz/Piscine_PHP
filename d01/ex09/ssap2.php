#!/usr/bin/php
<?PHP

function ft_split($input)
{
	$output = explode(" ", $input);
	$array = array_values(array_filter($output));
	return $array;
}

function ft_sort($i, $j)
{
	// custom sort
}
if ($argc > 1)
{
	$string = "";
	for ($i = 1; $i < $argc; $i++)
	{
		$my_arr = ft_split($argv[$i]);
		foreach($my_arr as $elem)
		{
			$string = $string.$elem." ";
		}
	}
	$arr = ft_split($string);
	usort($arr, "ft_sort");
	foreach($arr as $elem)
	{
		print($elem)."\n";
	}
}
?>