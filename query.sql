create database Salon_project;

use Salon_project;

-- creating the signup table

create table signup(
    id int not null auto_increment,
    FullName varchar(200) not null,
    Username varchar(200) not null,
    Email varchar(50) not null,
    Password varchar(50) not null,
    Confirm_Password varchar(50) not null,
    primary key(id)
);


INSERT INTO signup (FullName, Username, Email, Password, Confirm_Password) VALUES ('Sam Ben','they@me.com','12w3','12w3');

SELECT * FROM Signup;