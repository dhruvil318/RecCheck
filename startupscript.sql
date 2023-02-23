create database reccheck;
use reccheck;
create table members (
	member_id int auto_increment not null, 
    first_name varchar(50), 
    last_name varchar(50), 
    username varchar(20), 
    password varchar(50), 
    phone char(10), 
    email varchar (50),
    primary key (member_id)
);
-- insert into reccheck.members (first_name, last_name, username, password, phone, email) values ('John', 'Doe', 'johndoe1', 'plaintextpwd', '1234567890', 'johndoe@email.com');