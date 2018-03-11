CREATE TABLE Item (
  Item_ID INT AUTO_INCREMENT PRIMARY KEY,
  ID      INT,
  name    VARCHAR(255)
);

CREATE TABLE Computer (
  Computer_ID INT AUTO_INCREMENT PRIMARY KEY,
  Name        VARCHAR(255),
  Hard_Drive  VARCHAR(255),
  Ram         VARCHAR(255),
  GPU         VARCHAR(255),
  Screen_Size VARCHAR(255),
  CPU         VARCHAR(255),
  Type        VARCHAR(255),
  Price       DOUBLE,
  Picture     VARCHAR(255)
);

CREATE TABLE Accessory (
  Accessory_ID        INT AUTO_INCREMENT PRIMARY KEY,
  Name                VARCHAR(255),
  System_Requirements VARCHAR(255),
  Price               DOUBLE,
  Picture             VARCHAR(255)
);

CREATE TABLE Reviews (
  Review_ID       INT AUTO_INCREMENT PRIMARY KEY,
  Review          VARCHAR(255),
  Number_of_Stars INT,
  Item_Key        INT
);

CREATE TABLE Description (
  Description_ID INT AUTO_INCREMENT PRIMARY KEY,
  Features       TEXT,
  Tech_Specs     TEXT,
  In_Box         TEXT,
  Item_Key       INT
);

CREATE TABLE Employee (
  Employee_ID INT AUTO_INCREMENT PRIMARY KEY,
  User_ID     INT,
  Permissions INT
);

CREATE TABLE User (
  User_ID    INT AUTO_INCREMENT PRIMARY KEY,
  FirstName      VARCHAR(255),
  LastName       VARCHAR(255),
  Username       VARCHAR(255),
  Password       VARCHAR(255),
  Address        VARCHAR(255),
  email          VARCHAR(255),
  Credit_Card_ID INT
);

CREATE TABLE Credit_Card (
  Credit_Card_ID     INT AUTO_INCREMENT PRIMARY KEY,
  Credit_Card_Number VARCHAR(255),
  Type               VARCHAR(255),
  Expiration_Date    DATE,
  Customer_ID        INT
);

CREATE TABLE Cart (
  Cart_ID        INT AUTO_INCREMENT PRIMARY KEY,
  Items          JSON,
  Tax            DOUBLE,
  Total_Price    DOUBLE,
  How_Many_Items INT,
  Customer_ID    INT
);

CREATE TABLE Order_Submit (
  Order_ID               INT AUTO_INCREMENT PRIMARY KEY,
  Items                  JSON,
  Order_Number           INT,
  Estimated_Arrival_Date DATE,
  Date_Order_Placed      DATE,
  Customer_ID            INT
);
 