DROP TABLE IF EXISTS INFORMATIONS;
DROP TABLE IF EXISTS DESIGN;
DROP TABLE IF EXISTS USER;

create table USER(
    id_user int not null auto_increment,
    mail varchar(50),
    pwd varchar(30),
    login varchar(20) unique,
    primary key (id_user)
)engine=InnoDB;

create table DESIGN(
    id_design int not null auto_increment,
    name varchar(30) unique,
    image varchar(50),
    code text,
    primary key(id_design)
)engine=InnoDB;

create table INFORMATIONS(
    id_info int not null auto_increment,
    title varchar(50),
    section text,
    nav text,
    tagline varchar(160),
    footer text,
    id_user int not null,
    id_design int not null,
    primary key (id_info),
    constraint id_user foreign key (id_user) references USER(id_user) on delete cascade,
    constraint id_design foreign key (id_design) references DESIGN(id_design) on delete cascade
)engine=InnoDB;

INSERT INTO USER (mail,pwd,login) VALUES ('elodie16.p@gmail.com','elodie','epoulin');
