-- sql for the booking page.
use Salon_project;

create table Booking
(
	ID int auto_increment primary key,
	location varchar(100),
    category varchar(100),
    service varchar(100),
    date date,
    time time
);



-- Queries
-- 1. Get all the bookings
select * from Booking;
-- 2. Insert a new booking
insert into Booking (location, service) values ('Spintex', 'Hair');
insert into Booking (location, service) values ('Circle', 'Nail');
insert into Booking (location, service) values ('Osu', 'Pedicure');
insert into Booking (location, service) values ('Lapaz', 'Spa');
insert into Booking (location, service) values ('HO', 'Skin Care');
insert into Booking (location, service) values ('Kumasi', 'Make up');

