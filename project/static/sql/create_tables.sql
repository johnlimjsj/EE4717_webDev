
CREATE DATABASE MixAndMatch;

create table Customers
(  
	id int unsigned not null auto_increment primary key,
	firstname char(50) not null,
	lastname char(50) not null,
	phone int,
	email char(100),
	address char(100),
	paymentinfo char(50)
); 

create table Login
( 
	id int unsigned not null auto_increment primary key,
	customer_id int unsigned not null,
 	username char(50) not null,
 	password char(50) not null,
 	FOREIGN KEY(customer_id) REFERENCES Customers(id)
);

create table Delivery_Addresses
(
	id int unsigned not null auto_increment primary key,
	addr char(100),
	postalcode int unsigned
);



create table Orders
( 
	id int unsigned not null auto_increment primary key,
	customer_id int unsigned not null,
	thedate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	delivery_add_id int unsigned not null,
	status ENUM('Pending','Processing','Shipped','Arrived'),
	totalcost float not null,
	FOREIGN KEY(customer_id) REFERENCES Customers(id),
	FOREIGN KEY(delivery_add_id) REFERENCES Delivery_Addresses(id)
);

ALTER TABLE Orders
MODIFY COLUMN status ENUM('Pending','Processing','Shipped','Arrived');

INSERT INTO Order(customer_id, delivery_add_id, status, totalcost) VALUES (1, 1, 'Pending' , 0);

create table Order_items
( 
	id int unsigned not null auto_increment primary key,
	order_id int unsigned not null,
	product_id int unsigned not null,
	quantity int unsigned not null,
	FOREIGN KEY(order_id) REFERENCES Orders(id),
	FOREIGN KEY(product_id) REFERENCES Products(id)
);
ALTER TABLE Order_items
  DROP FOREIGN KEY order_items_ibfk_1;

ALTER TABLE Order_items
  ADD FOREIGN KEY (order_id) REFERENCES Orders(id);


create table Categories
( 
	id int unsigned not null auto_increment primary key,
	name ENUM('Jacket','Shirt','Pants','Shoes','Tie') not null,
	description char(100) not null,
	image char(50)
);

create table Colours
( 
	id int unsigned not null auto_increment primary key,
	name char(20) not null
);

create table Style
( 
	id int unsigned not null auto_increment primary key,
	name char(30) not null
);

ALTER TABLE Categories
MODIFY COLUMN name ENUM('Jacket','Shirt','Pants','Shoes','Tie') not null;

ALTER TABLE Products
ADD FOREIGN KEY(colour_id) REFERENCES Colours(id);

UPDATE Products SET colour_id=1 WHERE id=1;

create table Products
( 
	id int unsigned not null auto_increment primary key,
	cat_id int unsigned not null,
	colour_id int unsigned not null,
	style_id int unsigned not null,
	name char(100) not null,
	description char(200) not null,
	image char(50),
	price float not null,
	FOREIGN KEY(cat_id) REFERENCES Categories(id),
	FOREIGN KEY(colour_id) REFERENCES Colours(id),
	FOREIGN KEY(style_id) REFERENCES Style(id)

);





