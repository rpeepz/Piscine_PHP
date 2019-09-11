#!/usr/bin/php
<?PHP

function ft_is_sort($input)
{
	if (count($input) == 1)
		return (TRUE);
	$compare = $input;
	sort($compare);
	for ($i = 0; $i < count($compare); $i++)
	{
        if (strcmp($compare[$i], $input[$i]))
        return (FALSE);
	}
	return (TRUE);
}

?>