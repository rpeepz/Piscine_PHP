#!/usr/bin/php
<?PHP

function ft_split($input)
{
	$output = explode(" ", $input);
	//	$array = array_values(array_filter($output));
	$array = array_filter($output);
	sort($array);
	return $array;
}

// print_r(ft_split("Hello World AAA"));
?>
