#!/usr/bin/php
<?PHP

function ft_epur($input)
{
	$output = explode(" ", $input);
	$array = array_values(array_filter($output));
	return $array;
}

if ($argc > 1)
{
	$my_tab = ft_epur($argv[1]);
	$my_str = "";
	foreach ($my_tab as $elem)
	{
		$my_str = $my_str.$elem." ";
	}
	$my_str = trim($my_str);
	print $my_str."\n";
}
?>