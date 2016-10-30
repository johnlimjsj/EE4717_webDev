

/* flow:

when the customer is clicking around filling his cart, first populate the 'order_first' table.
Once he is ready to ship his order, then we populate the 'Orders' table
Whenever customer adds something to cart, for now, 'order_id' in 'Order_items' stays at the same value (which is 1 higher than the previous order_id value)
Once he is ready to buy, he clicks "buy", then it registers as an order, and is given a date time stamp. 
*/

INSERT INTO Customers VALUES
  (1, "Casey", "Duckering", 91234567, "cduck@gmail.com", "Piedmont Avenue 5", "123456789"),
  (2, "Tobin", "Holcomb", 98765432, "tobin@gmail.com", "Foothill Block 49", "123456789"),
  (3, "Johan", "Kok", 99119911, "jkok005@gmail.com", "Tampines Avenue 6", "155263553");

INSERT INTO Delivery_Addresses VALUES
  (1, "NTU Hall 11", "098789"),
  (2, "NUS Eusoff", "654538"),
  (3, "Pioneer and crescent", "878987");


INSERT INTO Orders(id, customer_id, thedate, delivery_add_id, status, totalcost) VALUES
  (1, 1, '2014-11-22', 1, 'Processing', 213.5),
  (2, 2, '2014-12-08', 2, 'Processing', 333.15),
  (3, 3, '2013-07-18', 3, 'Shipped', 245.78);

INSERT INTO Orders(customer_id, delivery_add_id, status, totalcost) VALUES
  (1, 1, 'Processing', 65.5);


INSERT INTO Order_items(id, order_id, product_id, quantity) VALUES
  (1, 2, 2, 4),
  (2, 2, 3, 3),
  (3, 3, 1, 6);

INSERT INTO Order_items(order_id, product_id, quantity) VALUES
  (4, 2, 1);


INSERT INTO Categories VALUES
  (1, "Jacket", "A Jacket. Keeps you warm", "jacket"),
  (2, "Shirt", "Shirts for formal occassions", "shirt"),
  (3, "Pants", "Long pants to cover your legs", "pants"),
  (4, "Shoes", "You need ot wear nice shoes to walk", "shoes"),
  (5, "Tie", "Something that goes around your neck", "tie");

INSERT INTO Products VALUES
  (1, 2, "Green Shirt", "this is basically a green shirt", "shirt_green", 54.67),
  (2, 3, "Blue Checkered Pants", "A nice checkered blue shirt that looks good", "pants_blue", 35.50),
  (3, 5, "Sunny Tie", "A bright colored tie that brightens everyone's day", "tie_sunny", 16.50);

INSERT INTO Products(cat_id, name, description, image, price) VALUES
(2, "Red Shirt", "this is basically a red shirt", "shirt_red", 46.00);

UPDATE products 
SET image='pants_blue'
WHERE id=2;


UPDATE Order_items oi
SET quantity= oi.quantity + 3
WHERE order_id=4 
AND product_id =3;

CASE ROW_COUNT()
  WHEN 0 THEN
    INSERT INTO Order_items (order_id, product_id, quantity) VALUES (4, 3, 2); 
END CASE;

INSERT INTO Order_items (order_id, product_id, quantity)
VALUES
(
   (CASE order_id WHEN '' THEN NULL ELSE order_id END),
   (CASE product_id WHEN '' THEN NULL ELSE product_id END),
   (CASE quantity WHEN '' THEN NULL ELSE quantity END)
);




IF ROW_COUNT() = 0 THEN
  INSERT INTO Order_items (order_id, product_id, quantity) VALUES
  (4, 3, 2);
END IF;

IF(ROW_COUNT() = 0, TRUE,FALSE)
          INSERT INTO Order_items (order_id, product_id, quantity) VALUES (4, 3, 2);


MERGE BookInventory bi
USING BookOrder bo
ON bi.TitleID = bo.TitleID
WHEN MATCHED AND
  bi.Quantity + bo.Quantity = 0 THEN
  DELETE
WHEN MATCHED THEN
  UPDATE
  SET bi.Quantity = bi.Quantity + bo.Quantity;
 
SELECT * FROM BookInventory;


SET final_price= CASE
   WHEN currency=1 THEN 0.81*final_price
   ELSE final_price
END

BEGIN

    IF ROW_COUNT() = 0 THEN
 INSERT INTO Order_items (order_id, product_id, quantity) VALUES (4, 3, 2)
    END IF;
 
END;


