CREATE DATABASE users;

CREATE TABLE workers (
    workers_id int primary key auto_increment,
    name varchar(40) , 
    email varchar(40)  ,
    phone varchar(40) 
    )