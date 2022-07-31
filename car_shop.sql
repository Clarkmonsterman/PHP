DROP DATABASE IF EXISTS car;
CREATE DATABASE car;


USE car;
CREATE TABLE carrental(
    Username VARCHAR(60),
    VehicleID VARCHAR(17),
    Brand VARCHAR(25),
    Model VARCHAR(25),
    Car_Type VARCHAR(25),
    PricePerDay DOUBLE(10,2),
    Mileage VARCHAR(6), /* Unlimited or Price per Mile */
    PrePaidGas VARCHAR(5), /* True or False */
    PickUp VARCHAR(50),
    DropOff VARCHAR(50),
    PRIMARY KEY (Username)
);



USE car;
CREATE TABLE carrecord(
    VehicleID VARCHAR(17),
    Brand VARCHAR(25),
    Model VARCHAR(25),
    PreviousBookings VARCHAR(100), /* seperated by spaces */   
    Comments VARCHAR(500), /* sepeartes by \n */
    Maintainence VARCHAR(100), /* True or False */
    Renting VARCHAR(5),
    PurchasedFrom VARCHAR(25),
    PRIMARY KEY (VehicleID)
);






GRANT SELECT, INSERT, DELETE, UPDATE
ON car.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';





