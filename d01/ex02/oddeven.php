#!/usr/bin/php
<?PHP

while (1)
{
	print "Enter a number: ";
	$pile = trim(fgets(STDIN));
	if (feof(STDIN))
	{
		print "\n";
		exit();
	}
	if (is_numeric($pile))
	{	
		if ($pile % 2)
		{
			print "The number ".$pile." is odd\n";
		}
		else
		{
			print "The number ".$pile." is even\n";
		}
	}
	else
	{
		print "'".$pile."' is not a number.\n";
	}
}?>