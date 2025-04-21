CREATE DATABASE users;

CREATE TABLE workers (
    workers_id int primary key AUTO_INCREMENT,
    name varchar(40) not null, 
    email varchar(40) not null,
    phone varchar(40) not null
    )