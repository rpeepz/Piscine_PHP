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
	$i = 0;
	$order = "abcdefghijklmnopqrstuvwxyz0123456789!\"
			#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	while (($i < strlen($a)) || ($i < strlen($b)))
	{
		$a_index = stripos($order, $a[$i]);
		$b_index = stripos($order, $b[$i]);
		if ($a_index > $b_index)
			return (1);
		else if ($a_index < $b_index)
			return (-1);
		else
			$i++;
	}
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