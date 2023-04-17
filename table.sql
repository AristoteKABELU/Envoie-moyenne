create table t_moyenne(
    id int not null primary key,
    matricule varchar(7),
    nom varchar(15) not null,
    postnom varchar(15) not null,
    prenom varchar(15) not null,
    genre char(1),
    `int 1/26` float,
    `td /5` float,
    `td /15` float,
    `bon` float,
    `int` float,
    `int.3 /10` float,
    `bon /3` float,
    `bon /2` float,
    `INT /7` float,
    `TDs /2` float,
    `BON /1` float,
    `Moyenne /10` int
);

load data local infile 'C:/Users/KABELU/Desktop/AS.csv'
into table moyenne_as.t_moyenne
fields terminated by ';'
enclosed by ''
lines terminated by '\r\n';
