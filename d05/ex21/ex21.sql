select MD5(REPLACE(CONCAT(phone_number, '42'), '7', '9'))  as ft5
from distrib where id_distrib = 84;