SELECT name FROM distrib WHERE
	(id_distrib = 42) OR
	((id_distrib >= 62) and (id_distrib <= 69)) OR
	(id_distrib = 71) OR
	((id_distrib >= 88) and (id_distrib <= 90)) OR
	(lower(name) LIKE '%y%y%')
	LIMIT 5 offset 2;