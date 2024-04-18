CREATE DATABASE UniXpress;

CREATE TABLE FORUM (
    Title varchar (50),
    FirstName varchar(50),
    LastName varchar(50), 
    Dayz datetime,
    Body varchar(700)
    Priority varchar (10),
);

CREATE TABLE PROFILE (
    ResID integer (9),
    FirstName varchar(50),
    MiddleName varchar(50),
    LastName varchar(50), 
    Email varchar(50),
    Gender varchar(50),
    DOB date,
    PrimaryContact varchar(20),
    SecondaryContact (20),
    Residence varchar(100),
    Blockname varchar (25),
    Apt varchar(5),
    About varchar(200),
);

CREATE TABLE NOTIFICATION(
    NDay datetime,
    NCount integer,
    ReservAlert varchar(200),
    ForumAlert varchar(100)
)
