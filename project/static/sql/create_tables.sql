

create table Login
( 
	id int unsigned not null auto_increment primary key,
	customer_id int unsigned not null FOREIGN KEY REFERENCES Customers(id),
 	username char(50) not null,
 	password char(50) not null,
);

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

create table Orders
( 
	id int unsigned not null auto_increment primary key,
	customer_id int unsigned not null FOREIGN KEY REFERENCES Customers(id),
	thedate date,
	delivery_add_id int not null FOREIGN KEY REFERENCES Delivery_Addresses(id),
	status ENUM('Processing','Shipped','Arrived'),
	totalcost float not null
);

create table Delivery_Addresses
{
	id int unsigned not null auto_increment primary key,
	address char(100),
	postalcode int(10)
};

create table Order_items
( 
	id int unsigned not null auto_increment primary key,
	order_id int unsigned not null FOREIGN KEY REFERENCES Orders(id),
	product_id int unsigned not null,
	quantity int unsigned not null
);

create table Products
( 
	id int unsigned not null auto_increment primary key,
	cat_id int unsigned not null FOREIGN KEY REFERENCES Orders(id),
	name char(100) not null,
	description char(100) not null,
	image char(50),
	price int unsigned not null
);

create table Categories
( 
	id int unsigned not null auto_increment primary key,
	name char(100) not null,
	description char(100) not null,
	image char(50),
);



