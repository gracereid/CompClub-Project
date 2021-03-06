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
DROP USER IF EXISTS 'cclub'@'localhost';
CREATE USER 'cclub'@'localhost' IDENTIFIED BY 'cclub';
GRANT ALL PRIVILEGES ON *.* TO 'cclub'@'localhost' WITH GRANT OPTION;

DROP DATABASE IF EXISTS Cclub_shop;
CREATE DATABASE Cclub_shop;

USE Cclub_shop;

CREATE TABLE customers(
	ID	VARCHAR(100)		NOT NULL,
	name	VARCHAR(20)		NOT NULL,
	balance	DECIMAL(3,2)		NOT NULL,
	type 	CHAR(1),
	PRIMARY KEY (ID)
);

CREATE TABLE products(
	ID			BIGINT		NOT NULL,
	name 			VARCHAR(20)	NOT NULL,
	type 			VARCHAR(20)	NOT NULL,
	price 			DECIMAL(3,2) 	NOT NULL,
	org_price 		DECIMAL(3,2) 	NOT NULL,
	quantity		INT 		NOT NULL,

	PRIMARY KEY(ID)
);

CREATE TABLE admin(
	ID			INT			NOT NULL	AUTO_INCREMENT,
	nick	 		VARCHAR(20)		NOT NULL,
	position 		VARCHAR(20)		NOT NULL,
	phone			VARCHAR(20)		NOT NULL,
	UNIQUE KEY(nick),
	PRIMARY KEY(ID)
);

CREATE TABLE sold(
	sold_ID		INT		NOT NULL	 AUTO_INCREMENT,
	ID		BIGINT 		NOT NULL,
	price		DECIMAL(3,2)	NOT NULL,
	quantity	INT		NOT NULL,
	date		DATE		NOT NULL,
	PRIMARY KEY(sold_ID),
	FOREIGN KEY (ID) REFERENCES products(ID)
);

CREATE TABLE report(
	ID			INT			NOT NULL	 AUTO_INCREMENT,
	invesment		DECIMAL(4,2)		NOT NULL,
        itemsb			INT			NOT NULL,
	revenue			DECIMAL(4,2)		NOT NULL,
        itemss                  INT                     NOT NULL,
	type 			VARCHAR(20)		NOT NULL,
	date			DATE			NOT NULL,

	PRIMARY KEY(ID)
	
);
