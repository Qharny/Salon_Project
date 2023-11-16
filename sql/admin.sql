use Salon_Project;
-- Create table to accept details

create table Admin (
    AdminID int not null auto_increment,
    AdminName varchar(50) not null,
    AdminEmail varchar(50) not null,
    AdminPassword varchar(50) not null,
    primary key (AdminID)

);


-- insert into admin table
insert into Admin (AdminNAme, AdminEmail, AdminPassword) values ('admin', 'admin@gmail.com', 'password');
insert into Admin (AdminNAme, AdminEmail, AdminPassword) values ('Manasseh', 'manasseh@gmail.com', 'Manasseh');
insert into Admin (AdminNAme, AdminEmail, AdminPassword) values ('MAy', 'may@gmail.com', 'mayor');

