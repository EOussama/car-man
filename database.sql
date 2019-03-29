-- Creating a database.
CREATE DATABASE IF NOT EXISTS `db_carsave`;

-- Using the created database.
USE `db_carsave`;

-- Creating the tables.
CREATE TABLE IF NOT EXISTS `Brands` (
    `BrandID`               SMALLINT NOT NULL AUTO_INCREMENT,
    `BrandName`             VARCHAR(50) NOT NULL,

    CONSTRAINT pk_brands_id PRIMARY KEY (`BrandID`)
);

CREATE TABLE IF NOT EXISTS `Models` (
    `ModelID`               SMALLINT NOT NULL AUTO_INCREMENT,
    `BrandID`               SMALLINT NOT NULL,
    `ModelName`             VARCHAR(50) NOT NULL,

    CONSTRAINT pk_models_id PRIMARY KEY (`ModelID`),
    CONSTRAINT fk_models_id FOREIGN KEY (`BrandID`) REFERENCES `Brands` (`BrandID`)
);

CREATE TABLE IF NOT EXISTS `Records` (
    `RecordID`              VARCHAR(50) NOT NULL,
    `Email`                 VARCHAR(50) NOT NULL,
    `BrandID`               SMALLINT NOT NULL,
    `ModelID`               SMALLINT NOT NULL,
    `PlateNumber`           VARCHAR(8) NOT NULL,
    `Year`                  SMALLINT NOT NULL,
    `Motive`                TINYINT NOT NULL,
    `Observation`           VARCHAR(500) NOT NULL,
    `Image`                 VARCHAR(500) NOT NULL,

    CONSTRAINT pk_records_id PRIMARY KEY (`RecordID`),
    CONSTRAINT fk_records_bid FOREIGN KEY (`BrandID`) REFERENCES `Brands` (`BrandID`),
    CONSTRAINT fk_records_mid FOREIGN KEY (`ModelID`) REFERENCES `Models` (`ModelID`)
);

-- Data insertion.
INSERT INTO `Brands`(`BrandName`) VALUES ('Seat'), ('Volkswagen'), ('Audi');

INSERT INTO `Models`(`BrandID`, `ModelName`) VALUES (1, 'Lion'), (1, 'Ibiza'), (1, 'Ateca'), (2, 'Polo'), (2, 'Golf'), (2, 'Tiguan'), (2, 'Passat'), (3, 'A1'), (3, 'A3'), (3, 'A4'), (3, 'Q5');
