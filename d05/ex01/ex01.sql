create table if not exists ft_table (
    id int not NULL AUTO_INCREMENT primary key,
    `login` varchar(8) not NULL DEFAULT 'toto',
    group ENUM('staff', 'student', 'other') not NULL,
    creation_date date not NULL
);