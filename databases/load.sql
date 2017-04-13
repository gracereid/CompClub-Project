/*TABLES*/
/*
customers:
ID is a string of character with no partern
name is the user ID
Balance is the money they have at the moment.
type admin vs normal

products:
ID is a barcode number
price priced assigned
org_price the original price
type if its a drink/salty or sweet snack

*/

DROP DATABASE IF EXISTS Cclub_shop;

CREATE DATABASE Cclub_shop;

USE Cclub_shop;

CREATE TABLE customers(
	ID		VARCHAR(100)		NOT NULL,
	name	VARCHAR(20)			NOT NULL,
	balance	DECIMAL(3,2)		NOT NULL,
	type 	CHAR(1),
	PRIMARY KEY (ID)
);

CREATE TABLE products(
	ID				INT				NOT NULL,
	name 			VARCHAR(20)		NOT NULL,
	type 			VARCHAR(20)		NOT NULL,
	price 			DECIMAL(3,2) 	NOT NULL,
	org_price 		DECIMAL(3,2) 	NOT NULL,
	quantity		INT 			NOT NULL,

	PRIMARY KEY(ID)
);

CREATE TABLE admin(
	ID				INT				NOT NULL,
	nick	 		VARCHAR(20)		NOT NULL,
	position 		VARCHAR(20)		NOT NULL,
	phone			VARCHAR(20)		NOT NULL,

	PRIMARY KEY(ID)
);

CREATE TABLE sold(
	ID				INT				NOT NULL,
	name			VARCHAR(20)		NOT NULL,
	type 			VARCHAR(20)		NOT NULL,
	price 			DECIMAL(3,2) 	NOT NULL,
	quantity		INT 			NOT NULL,
	when			DATE()			NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY (ID) REFERENCES products(ID),
	FOREIGN KEY (price) REFERENCES products(price),
	FOREIGN KEY (type) REFERENCES products(type)
);