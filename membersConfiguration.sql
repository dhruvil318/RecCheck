create database reccheck;
use reccheck;
create table members (
	member_id int auto_increment not null, 
    first_name varchar(50), 
    last_name varchar(50), 
    username varchar(20), 
    password varchar(255), 
    phone char(10), 
    email varchar (50),
    primary key (member_id)
);