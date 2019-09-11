#!/usr/bin/php
<?PHP

function ft_split($input)
{
	$output = explode(" ", $input);
	$array = array_values(array_filter($output));
	return $array;
}

if ($argc > 1)
{
	$arr = ft_split($argv[1]);
	$first = array_shift($arr);
    array_push($arr, $first);
    $my_str = "";
    foreach ($arr as $elem)
    {
        $my_str = $my_str.$elem." ";
    }
    $my_str = trim($my_str);
	print $my_str."\n";
}

?>