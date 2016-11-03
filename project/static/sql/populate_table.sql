

/* flow:

when the customer is clicking around filling his cart, first populate the 'order_first' table.
Once he is ready to ship his order, then we populate the 'Orders' table
Whenever customer adds something to cart, for now, 'order_id' in 'Order_items' stays at the same value (which is 1 higher than the previous order_id value)
Once he is ready to buy, he clicks "buy", then it registers as an order, and is given a date time stamp. 
*/

INSERT INTO Customers(firstname, lastname, phone, email, address, paymentinfo) VALUES
  ("Casey", "Duckering", 91234567, "cduck@gmail.com", "Piedmont Avenue 5", "123456789"),
  ("Tobin", "Holcomb", 98765432, "tobin@gmail.com", "Foothill Block 49", "123456789"),
  ("Johan", "Kok", 99119911, "jkok005@gmail.com", "Tampines Avenue 6", "155263553");

INSERT INTO Delivery_Addresses VALUES
  (1, "NTU Hall 11", "098789"),
  (2, "NUS Eusoff", "654538"),
  (3, "Pioneer and crescent", "878987");


INSERT INTO Orders(customer_id, thedate, delivery_add_id, status, totalcost) VALUES
  (1, '2014-11-22', 1, 'Processing', 213.5),
  (2, '2014-12-08', 2, 'Processing', 333.15),
  (3, '2013-07-18', 3, 'Shipped', 245.78),
  (1, '2016-10-27', 1, 'Processing', 65.5),
  (1, '2016-10-28', 1, 'Pending', 0),
  (2, '2016-10-28', 1, 'Pending', 0);



INSERT INTO Order_items(order_id, product_id, quantity) VALUES
  (2, 2, 4),
  (2, 3, 3),
  (3, 1, 6),
  (4, 1, 5),
  (5, 1, 2),
  (5, 4, 2);


INSERT INTO Categories VALUES
  (1, "Jacket", "A Jacket. Keeps you warm", "jacket"),
  (2, "Shirt", "Shirts for formal occassions", "shirt"),
  (3, "Pants", "Long pants to cover your legs", "pants"),
  (4, "Shoes", "You need ot wear nice shoes to walk", "shoes"),
  (5, "Tie", "Something that goes around your neck", "tie");

INSERT INTO Style VALUES
  (1, "Modern"),
  (2, "Retro"),
  (3, "Oldies");

INSERT INTO Colours VALUES
  (1, "Red"),
  (2, "Orange"),
  (3, "Yellow"),
  (4, "Green"),
  (5, "Blue"),
  (6, "Purple"),
  (7, "Black"),
  (8, "White");

INSERT INTO Products(cat_id, colour_id, style_id, name, description, image, price) VALUES
  (2, 4, 1, "Green Shirt", "this is basically a green shirt", "shirt_green", 54.67),
  (3, 5, 2, "Blue Checkered Pants", "A nice checkered blue shirt that looks good", "pants_blue", 35.50),
  (5, 2, 3, "Sunny Tie", "A bright colored tie that brightens everyone's day", "tie_sunny", 16.50);
  (2, 5, 3, "Blue Shirt", "Basically a blue shirt", "shirt_blue", 32.67),
  (2, 1, 1, "Red Shirt", "Basically a Red shirt thats modern", "shirt_red", 46.00);






