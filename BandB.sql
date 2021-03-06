CREATE DATABASE IF NOT EXISTS bnb;
USE bnb;

-- The rooms for the bed and breakfast
DROP TABLE IF EXISTS room;
CREATE TABLE IF NOT EXISTS room (
  roomID int unsigned NOT NULL auto_increment,
  roomname varchar(100) NOT NULL,
  description text default NULL,
  roomtype character default 'D',  
  beds int,
  PRIMARY KEY (roomID)
) AUTO_INCREMENT=1;
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (1,"Kellie","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing","S",5);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (2,"Herman","Lorem ipsum dolor sit amet, consectetuer","D",5);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (3,"Scarlett","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur","D",2);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (4,"Jelani","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam","S",2);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (5,"Sonya","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.","S",5);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (6,"Miranda","Lorem ipsum dolor sit amet, consectetuer adipiscing","S",4);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (7,"Helen","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.","S",2);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (8,"Octavia","Lorem ipsum dolor sit amet,","D",3);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (9,"Gretchen","Lorem ipsum dolor sit","D",3);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (10,"Bernard","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer","S",5);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (11,"Dacey","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur","D",2);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (12,"Preston","Lorem","D",2);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (13,"Dane","Lorem ipsum dolor","S",4);
INSERT INTO `room` (`roomID`,`roomname`,`description`,`roomtype`,`beds`) VALUES (14,"Cole","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam","S",1);

-- Customers
DROP TABLE IF EXISTS customer;
CREATE TABLE IF NOT EXISTS customer (
  customerID int unsigned NOT NULL auto_increment,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(40) NOT NULL DEFAULT 'password',
  PRIMARY KEY (customerID)
) AUTO_INCREMENT=1;

INSERT INTO customer (customerID,firstname,lastname,email) VALUES (1,"Garrison","Jordan","sit.amet.ornare@nequesedsem.edu"),
(2,"Desiree","Collier","Maecenas@non.co.uk"),
(3,"Irene","Walker","id.erat.Etiam@id.org"),
(4,"Forrest","Baldwin","eget.nisi.dictum@a.com"),
(5,"Beverly","Sellers","ultricies.sem@pharetraQuisqueac.co.uk"),
(6,"Glenna","Kinney","dolor@orcilobortisaugue.org"),
(7,"Montana","Gallagher","sapien.cursus@ultriciesdignissimlacus.edu"),(8,"Harlan","Lara","Duis@aliquetodioEtiam.edu"),
(9,"Benjamin","King","mollis@Nullainterdum.org"),
(10,"Rajah","Olsen","Vestibulum.ut.eros@nequevenenatislacus.ca"),
(11,"Castor","Kelly","Fusce.feugiat.Lorem@porta.co.uk"),
(12,"Omar","Oconnor","eu.turpis@auctorvelit.co.uk"),
(13,"Porter","Leonard","dui.Fusce@accumsanlaoreet.net"),
(14,"Buckminster","Gaines","convallis.convallis.dolor@ligula.co.uk"),
(15,"Hunter","Rodriquez","ridiculus.mus.Donec@est.co.uk"),
(16,"Zahir","Harper","vel@estNunc.com"),
(17,"Sopoline","Warner","vestibulum.nec.euismod@sitamet.co.uk"),
(18,"Burton","Parrish","consequat.nec.mollis@nequenonquam.org"),
(19,"Abbot","Rose","non@et.ca"),
(20,"Barry","Burks","risus@libero.net");

DROP TABLE IF EXISTS booking;
CREATE TABLE IF NOT EXISTS booking (
  bookingID int unsigned NOT NULL auto_increment,
  roomID int unsigned NOT NULL,
  customerID int unsigned NOT NULL,
  checkinDate datetime NOT NULL,
  checkoutDate datetime NOT NULL,
  PRIMARY KEY (bookingID),
  FOREIGN KEY (roomID) REFERENCES room(roomID) ON UPDATE CASCADE,
  FOREIGN KEY (customerID) REFERENCES customer(customerID) ON UPDATE CASCADE
) AUTO_INCREMENT=1;

-- I feel as though for a bookings table we should have reviews linked, this should be a separate table so as to avoid cluttering up the bookings table
-- with reviews, we can simply have a reference to a room on each review instead.

INSERT INTO booking (bookingID, roomID, customerID, checkinDate, checkoutDate) VALUES (1, 1, 1, '2021-05-12', '2021-05-17'),
(2, 4, 12, '2021-04-10', '2021-05-05'),
(3, 10, 4, '2021-05-12', '2021-05-17')
(4, 20, 8, '2021-05-12', '2021-05-17')


DROP TABLE IF EXISTS reviews;
CREATE TABLE IF NOT EXISTS reviews (
  id int unsigned NOT NULL auto_increment,
  room_id int unsigned NOT NULL,
  customer_id int unsigned NOT NULL,
  booking_id int unsigned NOT NULL,
  review varchar(500) NOT NULL,
  rating int unsigned NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (room_id) REFERENCES rooms(id) ON UPDATE CASCADE,
  FOREIGN KEY (customer_id) REFERENCES customers(id) ON UPDATE CASCADE,
  FOREIGN KEY (booking_id) references bookings(id) ON UPDATE CASCADE
) AUTO_INCREMENT=1;

