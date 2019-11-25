SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

drop table if exists Accounts;
create table Accounts (
    Account_No varchar(25) not null,
    customer_ID int(10) not null,
    acc_status varchar(25) not null,
    acc_open_date date not null,
    account_type varchar(25) not null,
    account_balance decimal(10,2) not null,
    primary key(Account_No)
);

drop table if exists Branch;
create table Branch(
    IFS_code varchar(25) not null,
    Branch_Name varchar(25) not null,
    City varchar(25) not null,
    Branch_Address varchar(25) not null,
    State varchar(25) not null,
    Country varchar(25) not null,
    PIN_Code varchar(25) not null,
    primary key(IFS_code)
);

drop table if exists Account_Master;
create table Account_Master (
    Account_Type varchar(25) not null,
    prefix varchar(25) not null,
    Min_balance decimal(10,2) not null,
    interest decimal(10,2) not null,
    primary key (Account_Type)
);

drop table if exists Customer;
create table Customer (
    CustomerID int(10) not null,
    IFS_Code varchar(25) not null,
    F_Name varchar(25) not null,
    L_Name varchar(25) not null,
    Login_ID varchar(25) not null,
    Acc_Pass varchar(25) not null,
    Trans_Pass varchar(25) not null,
    Acc_Status varchar(25) not null,
    City varchar(25) not null,
    State varchar(25) not null,
    Country varchar(25) not null,
    Acc_Open_Date date not null,
    Last_Login datetime not null,
    primary key(CustomerID)
);

drop table if exists Employee;
create table Employee (
    Emp_ID int(10) not null,
    Emp_Name varchar(25) not null,
    Login_ID varchar(25) not null,
    password varchar(25) not null,
    Email_ID varchar(25) not null,
    Contact_No varchar(25) not null,
    Create_Date date not null,
    Last_Login datetime not null,
    primary key(Emp_ID)
);

drop table if exists Loan;
create table Loan (
    Loan_ID int(10) not null,
    Loan_Type varchar(25) not null,
    Loan_Amount varchar(25) not null,
    Customer_ID int(10) not null,
    Interest float(10,2) not null,
    Start_Date date not null,
    primary key(Loan_ID)
);

drop table if exists Loan_Payment;
create table Loan_Payment (
    Payment_ID int(10) not null,
    Date date not null,
    Paid_Amount float(10,2) not null,
    Principle_Amount float(10,2) not null,
    Balance float(10,2) not null,
    primary key(Payment_ID)
);

drop table if exists Loan_Type;
create table Loan_Type (
    Loan_Type varchar(25) not null,
    prefix varchar(25) not null,
    Max_Amount float(10,2) not null,
    Min_Amount float(10,2) not null,
    Interest float(10,2) not null,
    status varchar(25) not null
);

drop table if exists Register_Payee;
create table Register_Payee (
    SL_No decimal(11,0) not null,
    Payee_Name varchar(25) not null,
    Account_No varchar(25) not null,
    Account_Type varchar(25) not null,
    Bank_Name varchar(25) not null,
    IFS_Code varchar(25) not null,
    primary key(SL_No)
);

drop table if exists Transactions;
create table Transactions (
    Transaction_ID int(10) not null,
    Payment_Date datetime not null,
    Payee_ID int(10) not null,
    Recieve_ID int(10) not null,
    Amount decimal(10,0) not null,
    Payment_State text not null,
    primary key(Transaction_ID)
);

ALTER TABLE Accounts
    add constraint fk1_Accounts foreign key (Customer_ID) references Customer(CustomerID);

ALTER TABLE Customer
    add constraint fk1_Customer foreign key (IFS_Code) references Branch(IFS_code);

ALTER TABLE Loan
    add constraint fk1_Loan foreign key (Customer_ID) references Customer(CustomerID);

ALTER Table Register_Payee
    add constraint fk1_Register_Payee foreign key (Account_No) references Accounts(Account_No);

ALTER Table Register_Payee
    add constraint fk2_Register_Payee foreign key (IFS_Code) references Branch(IFS_Code);

ALTER Table Transactions
    add constraint fk1_Transactions foreign key (Payee_ID) references Customer(CustomerID);

ALTER Table Transactions
    add constraint fk2_Transactions foreign key (Recieve_ID) references Customer(CustomerID);
    