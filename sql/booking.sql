-- sql for the booking page.
use Salon_project;

-- drop table Booking;

create table Booking
(
	ID int auto_increment primary key,
    name varchar(200),
    category varchar(100),
    service varchar(100),
    stylist varchar(100),
    contact varchar(20),
    date date,
    time time
);



-- Queries
-- 1. Get all the bookings
select * from Booking;
-- 2. Insert into booking
-- insert into Booking (category, service) values ('Spintex', 'Hair');
-- insert into Booking (category, service) values ('Circle', 'Nail');
-- insert into Booking (category, service) values ('Osu', 'Massage');
-- insert into Booking (category) values ('Lapaz');
-- insert into Booking (category) values ('HO');
-- insert into Booking (category) values ('Kumasi');
-- insert into Booking (category, service, date, time) values ('Kumasi','Massage','spa','2023-09-10', '03:56:45');
