-- sql for the booking page.
use Salon_project;

create table Booking
(
	location varchar(100),
    category varchar(100),
    service varchar(100),
    date date,
    time time
);