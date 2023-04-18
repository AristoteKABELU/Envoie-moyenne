create table t_moyenne(
    id int not null primary key,
    matricule varchar(7),
    nom varchar(15) not null,
    postnom varchar(15) not null,
    prenom varchar(15) not null,
    genre char(1),
    `int 1/26` null float,
    `td /5` null float,
    `td /15` null float,
    `bon` null  float,
    `int` null float,
    `int.3 /10` null float,
    `bon /3` null float,
    `bon /2` null float,
    `INT /7` null float,
    `TDs /2` null float,
    `BON /1` null float,
    `Moyenne /10` int
);

load data local infile 'C:/Users/KABELU/Desktop/AS.csv'
into table moyenne_as.t_moyenne
fields terminated by ';'
enclosed by ''
lines terminated by '\r\n';
