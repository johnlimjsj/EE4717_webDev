
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
 	username varchar(50) not null,
 	password varchar(50) not null,
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
	status ENUM('Processing','Shipped','Arrived'),
	totalcost float not null,
	FOREIGN KEY(customer_id) REFERENCES Customers(id),
	FOREIGN KEY(delivery_add_id) REFERENCES Delivery_Addresses(id)
);

create table Order_items
( 
	id int unsigned not null auto_increment primary key,
	order_id int unsigned not null,
	product_id int unsigned not null,
	quantity int unsigned not null,
	FOREIGN KEY(order_id) REFERENCES Orders(id),
	FOREIGN KEY(product_id) REFERENCES Products(id)
);

create table Categories
( 
	id int unsigned not null auto_increment primary key,
	name ENUM('Jacket','Shirt','Pants','Shoes','Tie') not null,
	description char(100) not null,
	image char(50)
);

create table Products
( 
	id int unsigned not null auto_increment primary key,
	cat_id int unsigned not null,
	name char(100) not null,
	description char(200) not null,
	image char(50),
	price float not null,
	FOREIGN KEY(cat_id) REFERENCES Categories(id)
);





