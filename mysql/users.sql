create database factoryww;

create table users(
	id int primary key auto_increment not null,
	username varchar(100) unique,
	password varchar(100)
);