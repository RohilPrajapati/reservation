create table seat (
    id int not null AUTO_INCREMENT,
    name varchar(10) not null,
    primary key (id)
);

insert into seat(name) values('A1'),('A2'),('A3'),('A4'),('A5'),('A6'),('B1'),('B2'),('B3'),('B4'),('B5'),('B6');
create table user(
    id int not null auto_increment,
    username varchar(150) not null,
    password varchar(255) not null,
    primary key (id)
)
insert into user values (1,'rohil','prajapati');

create table movie(
    id int not null AUTO_INCREMENT,
    name varchar(150) not null,
    primary key (id)
);
insert into movie(name) values ('KFG'),('Avenger'),('Thor');

create table reserved_seat (
    user int not null,
    movie_id int not null,
    seat_id int not null,
    foreign key (movie_id) references movie(id),
    foreign key (seat_id) references seat(id),
    foreign key(user) references user(id)
);