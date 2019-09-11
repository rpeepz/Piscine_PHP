#!/usr/bin/php
<?PHP

function ft_split($input)
{
	$output = explode(" ", $input);
	$array = array_values(array_filter($output));
	return $array;
}

// print_r(ft_split("Hello World AAA"));
?>