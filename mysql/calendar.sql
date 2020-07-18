create table calendar(
	id int primary key auto_increment not null,
	content varchar(255),
	day varchar(2) not null,
	user_id int not null,
	status varchar(1)
);