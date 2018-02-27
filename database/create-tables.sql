
-- Drop table if it already exists so you can start fresh each time.

DROP TABLE IF EXISTS contacts;
DROP TABLE IF EXISTS news_items;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS user_requests;
DROP TABLE IF EXISTS guest_requests;

-- Create a users table in your database. You may have different fields. This isn’t
-- necessarily the best design.
CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR (256) NOT NULL,
        name VARCHAR (50) NOT NULL,
		address VARCHAR (50) NULL,
		city VARCHAR (50) NULL,
		phone VARCHAR (20) NULL,
		administrator BOOLEAN NULL
		
);


-- Create a service requests table for guests not logged in as users
CREATE TABLE guest_requests (
		req_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR (50) NOT NULL,
		email VARCHAR(100) NOT NULL,
		address VARCHAR (50) NOT NULL,
		phone VARCHAR (20) NOT NULL,
		city VARCHAR (50) NOT NULL,
		standing_water BOOLEAN NOT NULL,
		annoyance BOOLEAN NOT NULL,
		message VARCHAR (1000) NULL,
		req_date date NOT NULL,
		resolved BOOLEAN NOT NULL,
		technician_notes VARCHAR (1000) NULL
);


-- Create a service request table for users
CREATE TABLE user_requests(
		req_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		user_id INT NOT NULL,
		standing_water BOOLEAN NOT NULL,
		annoyance BOOLEAN NOT NULL,
		message VARCHAR (1000) NULL,
		req_date date NOT NULL,
		resolved BOOLEAN NOT NULL,
		technician_notes VARCHAR (1000) NULL
);

-- Create a table for miscellaneous contact requests
CREATE TABLE contacts (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(50) NOT NULL,
		email VARCHAR(100) NOT NULL,
		message VARCHAR(1000) NOT NULL,
		contact_date date NOT NULL,
		notes VARCHAR(1000) NULL,
		resolved BOOLEAN NOT NULL

);

		
-- Create a table for news items to go on the feed of index		
CREATE TABLE news_items(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		user_id INT NOT NULL,
		item_date DATE NOT NULL,
		item_body VARCHAR (1000) NOT NULL
);

INSERT INTO users (email, password, name, administrator) VALUES ('admin@gmail.com', 'admin', 'admin', true);
INSERT INTO users (email, password, name) VALUES ('guest@gmail.com', 'guest', 'guest');
INSERT INTO users (email, password, name) VALUES('snoopy@peanuts.com', 'w00fWOOF', 'Snoopy');
INSERT INTO users (email, password, name) VALUES('scooby@whereareyou.com', 'w00fWOOF', 'Scooby');
INSERT INTO users (email, password, name) VALUES('snowwhite@disney.com', 'iLov3AppleZ', 'Snow White');
INSERT INTO users (email, password, name) VALUES('moana@disney.com', 'born2s@il', 'Moana');
INSERT INTO users (email, password, name, administrator) VALUES('wesleygruenberg@u.boisestate.edu', 'm0squ1t0', 'Wesley Gruenberg', true);
INSERT INTO users (email, password, name) VALUES('aaronwhetzel@dork.com', '1m@n3rd', 'Aaron Whetzel');

insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Lydie Tyt', 'ltyt0@telegraph.co.uk', '676-669-7238', '58195 Grayhawk Pass', 'Widuchowa', true, true, false, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '2017-06-14 09:38:45');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Linn Sullivan', 'lsullivan1@sitemeter.com', '161-414-3434', '45 Golden Leaf Place', 'Honoria', true, false, true, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2017-03-04 17:25:25');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Anabelle Ludye', 'aludye2@addthis.com', '514-178-6798', '99 4th Point', 'Hengzhou', true, false, false, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2016-12-14 05:04:42');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Jackqueline Barrowclough', 'jbarrowclough3@wsj.com', '708-154-1724', '061 Crest Line Circle', 'Jidd Ḩafş', true, false, true, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '2017-09-26 04:07:49');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Jeanelle Rigardeau', 'jrigardeau4@epa.gov', '854-422-7435', '83 Hoffman Place', 'Igurubi', false, true, false, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', '2017-04-19 04:34:26');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Derick Allday', 'dallday5@google.de', '464-893-5062', '91 Prairie Rose Center', 'Zheyuan', false, false, false, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2017-05-30 09:33:00');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Ev Billyard', 'ebillyard6@hud.gov', '429-450-2241', '9 Lindbergh Court', 'Trairi', true, true, false, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2017-04-13 09:14:19');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Gino Mudle', 'gmudle7@paypal.com', '162-316-3150', '5930 Amoth Junction', 'Chittagong', true, true, true, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '2017-10-26 11:01:17');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Drusy Mulcahy', 'dmulcahy8@quantcast.com', '513-137-4434', '63 Golden Leaf Hill', 'Dzerzhinskiy', true, false, false, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', '2016-12-29 09:48:25');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Ricardo Mapletoft', 'rmapletoft9@walmart.com', '169-260-4553', '72 Heath Road', 'Kardítsa', true, true, false, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'In congue. Etiam justo. Etiam pretium iaculis justo.', '2017-09-26 11:22:56');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Nata Wein', 'nweina@w3.org', '796-991-8728', '58 Chinook Avenue', 'Navais', false, true, true, 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '2017-10-26 12:29:10');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Kendrick Denzilow', 'kdenzilowb@dedecms.com', '296-937-6470', '32 Melby Plaza', 'Moerewa', true, true, false, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', '2017-01-13 08:02:40');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Cissiee Ceney', 'cceneyc@flickr.com', '848-876-8855', '1254 John Wall Crossing', 'Castelo', true, false, false, 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2017-02-03 10:24:05');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Westley Cutten', 'wcuttend@tinypic.com', '625-321-7303', '9729 Sunfield Junction', 'Quibdó', true, false, false, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '2017-06-28 22:46:53');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Nichol Dorbin', 'ndorbine@pinterest.com', '862-890-3909', '48262 Weeping Birch Avenue', 'Khorramdarreh', true, false, false, 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '2017-01-07 06:31:27');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Albertine Blaase', 'ablaasef@google.it', '304-991-3164', '65 Starling Park', 'Yangzi Jianglu', true, false, false, 'Fusce consequat. Nulla nisl. Nunc nisl.', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2016-11-23 04:16:00');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Siusan Ginn', 'sginng@usda.gov', '810-205-0015', '4485 Everett Circle', 'Capela', false, false, true, 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', '2017-07-13 14:31:33');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Devin Noury', 'dnouryh@amazon.co.jp', '638-163-8524', '6185 Larry Circle', 'Santo Isidro', false, false, true, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', '2016-11-11 22:30:26');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Matelda Cardoo', 'mcardooi@dropbox.com', '178-640-4181', '2323 Burrows Parkway', 'Zhongtai', true, true, false, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2017-05-27 08:30:47');
insert into guest_requests (name, email, phone, address, city, standing_water, annoyance, resolved, message, technician_notes, req_date) values ('Kalinda Ellery', 'kelleryj@patch.com', '630-631-3804', '650 Stone Corner Plaza', 'Lavras', false, false, true, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2017-01-29 18:10:28');

insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, true, false, 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', null, 4, '2017-08-09 07:33:31');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, true, true, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 7, '2016-11-09 20:32:29');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, false, false, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 2, '2017-08-16 13:23:11');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, true, true, 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 7, '2016-12-21 15:35:59');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, false, false, 'In congue. Etiam justo. Etiam pretium iaculis justo.', null, 7, '2017-09-24 11:24:05');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, false, false, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 2, '2017-03-14 03:28:38');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, true, true, 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 5, '2016-11-10 15:28:28');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, false, true, 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 2, '2016-12-18 17:52:20');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, false, false, 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 4, '2017-09-30 04:06:27');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, false, false, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 5, '2017-06-27 13:01:43');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, true, true, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', null, 8, '2017-04-27 23:47:29');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, true, true, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 6, '2017-09-07 02:12:58');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, false, true, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 8, '2017-06-07 15:46:38');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, true, true, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 1, '2017-01-25 12:00:37');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, false, true, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 8, '2017-01-14 13:48:50');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, true, false, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 5, '2017-02-24 12:59:16');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, true, true, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 2, '2017-08-02 18:02:15');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, true, true, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', null, 5, '2017-04-23 00:27:15');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (false, false, true, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 8, '2017-01-28 21:59:57');
insert into user_requests (standing_water, annoyance, resolved, message, technician_notes, user_id, req_date) values (true, true, true, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 5, '2017-02-08 15:57:14');


insert into contacts (name, email, resolved, message, contact_date) values ('Heywood Iacavone', 'hiacavone0@ask.com', false, 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2017-06-19 13:14:04');
insert into contacts (name, email, resolved, message, contact_date) values ('Morie Tomley', 'mtomley1@1und1.de', true, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2017-06-19 21:57:39');
insert into contacts (name, email, resolved, message, contact_date) values ('Mandy Matthius', 'mmatthius2@wunderground.com', false, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2016-12-10 10:09:01');
insert into contacts (name, email, resolved, message, contact_date) values ('Richardo Kelston', 'rkelston3@eepurl.com', true, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2016-12-03 17:39:14');
insert into contacts (name, email, resolved, message, contact_date) values ('Andrei Harber', 'aharber4@businessweek.com', false, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '2017-02-14 15:22:52');
insert into contacts (name, email, resolved, message, contact_date) values ('Julieta Mellem', 'jmellem5@parallels.com', true, 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '2017-05-14 14:12:26');
insert into contacts (name, email, resolved, message, contact_date) values ('Chiquita Pruckner', 'cpruckner6@blinklist.com', true, 'Phasellus in felis. Donec semper sapien a libero. Nam dui.', '2017-08-02 07:20:23');
insert into contacts (name, email, resolved, message, contact_date) values ('Giuditta Pietesch', 'gpietesch7@google.ru', true, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', '2017-08-18 07:21:54');
insert into contacts (name, email, resolved, message, contact_date) values ('Karla Huygens', 'khuygens8@booking.com', true, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2017-03-20 21:08:17');
insert into contacts (name, email, resolved, message, contact_date) values ('Olin Janicijevic', 'ojanicijevic9@soundcloud.com', true, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2017-04-26 18:19:35');
insert into contacts (name, email, resolved, message, contact_date) values ('Becka Enterlein', 'benterleina@bravesites.com', true, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '2017-08-18 22:33:29');
insert into contacts (name, email, resolved, message, contact_date) values ('Farrel Janodet', 'fjanodetb@hugedomains.com', false, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2017-08-24 21:49:25');
insert into contacts (name, email, resolved, message, contact_date) values ('Marlo Durante', 'mdurantec@symantec.com', false, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '2017-04-15 14:16:39');
insert into contacts (name, email, resolved, message, contact_date) values ('Annis O''Moylan', 'aomoyland@hhs.gov', true, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', '2017-08-28 09:16:52');
insert into contacts (name, email, resolved, message, contact_date) values ('Desiree Cabel', 'dcabele@blog.com', true, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2017-06-22 22:39:20');
insert into contacts (name, email, resolved, message, contact_date) values ('Adham Fealey', 'afealeyf@columbia.edu', true, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2017-06-19 11:27:55');
insert into contacts (name, email, resolved, message, contact_date) values ('Gaile Aliberti', 'galibertig@time.com', false, 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', '2017-08-25 18:45:18');
insert into contacts (name, email, resolved, message, contact_date) values ('Culley Bartocci', 'cbartoccih@go.com', true, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '2017-06-04 01:22:51');
insert into contacts (name, email, resolved, message, contact_date) values ('Fairlie Fatharly', 'ffatharlyi@blogs.com', false, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2017-09-23 12:05:04');
insert into contacts (name, email, resolved, message, contact_date) values ('Arlena Byne', 'abynej@topsy.com', false, 'Fusce consequat. Nulla nisl. Nunc nisl.', '2017-08-06 16:52:54');
			
			
insert into news_items (user_id, item_date, item_body) values (1, '2017-10-07 22:42:04', ' Operations Closed Until Spring');
insert into news_items (user_id, item_date, item_body) values (1, '2016-12-15 21:33:37', 'Labor Day is coming up and it is still hot! Make sure you are taking extra precautions');
insert into news_items (user_id, item_date, item_body) values (1, '2017-08-15 20:45:48', 'In anticipation of the Eclipse we will be shutting down services over the weekend.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-07-21 05:57:36', 'Our tests have tested positive for <a href="wnv.php">West Nile Virus</a> at the Mud Lake south boat ramps. If going to those areas, wear plenty of repellant and long sleeves. Clarke will be conducting extra treatments in the area');
insert into news_items (user_id, item_date, item_body) values (1, '2016-11-05 05:35:50', 'Clarke\'s operations will be suspended for 7/18/2017 to complete our Snake River Clean-up service project');
insert into news_items (user_id, item_date, item_body) values (1, '2017-03-01 00:30:02', 'Extra treatments for 4th of July, we are working overtime to make sure you are comfortable this holiday!');
insert into news_items (user_id, item_date, item_body) values (1, '2017-03-16 10:58:58', 'County-wide service in effect, contact us if special service required!');
insert into news_items (user_id, item_date, item_body) values (1, '2016-12-05 05:57:23', ' Night spraying beginning in Terreton Area!');
insert into news_items (user_id, item_date, item_body) values (1, '2017-03-21 07:10:03', 'Larviciding in progress, report that standing water!');
insert into news_items (user_id, item_date, item_body) values (1, '2017-01-28 22:47:25', 'We are hiring here! <a href = "http://clarke.submit4jobs.com/">Clarke Website</a>');
insert into news_items (user_id, item_date, item_body) values (1, '2016-12-11 11:22:30', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-10-28 13:14:52', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-09-30 11:46:59', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-09-08 14:32:42', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-05-05 05:05:54', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.');
insert into news_items (user_id, item_date, item_body) values (1, '2016-12-31 23:24:04', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-08-19 23:29:27', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-01-29 19:12:04', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.');
insert into news_items (user_id, item_date, item_body) values (1, '2016-12-19 13:17:56', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.');
insert into news_items (user_id, item_date, item_body) values (1, '2017-02-16 22:19:15', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.');



