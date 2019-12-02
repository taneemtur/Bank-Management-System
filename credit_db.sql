
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS accountmaster;
CREATE TABLE IF NOT EXISTS accountmaster (
  accounttype varchar(25) NOT NULL,
  prefix varchar(11) NOT NULL,
  minbalance decimal(12,2) NOT NULL,
  interest decimal(10,2) NOT NULL,
  PRIMARY KEY (accounttype)
);

DROP TABLE IF EXISTS accounts;
CREATE TABLE IF NOT EXISTS accounts (
  accno varchar(25) NOT NULL,
  customerid int(10) NOT NULL,
  accstatus varchar(25) NOT NULL,
  accopendate date NOT NULL,
  accounttype varchar(25) NOT NULL,
  accountbalance decimal(10,2) NOT NULL,
  PRIMARY KEY (accno)
);


DROP TABLE IF EXISTS branch;
CREATE TABLE IF NOT EXISTS branch (
  ifsccode varchar(25) NOT NULL,
  branchname varchar(50) NOT NULL,
  city varchar(25) NOT NULL,
  branchaddress text NOT NULL,
  state varchar(25) NOT NULL,
  country varchar(25) NOT NULL,
  pincode int(11) NOT NULL,
  PRIMARY KEY (ifsccode)
);

DROP TABLE IF EXISTS customers;
CREATE TABLE IF NOT EXISTS customers (
  customerid int(10) NOT NULL,
  ifsccode varchar(25) NOT NULL,
  firstname varchar(25) NOT NULL,
  lastname varchar(25) NOT NULL,
  loginid varchar(25) NOT NULL,
  accpassword varchar(50) NOT NULL,
  transpassword varchar(50) NOT NULL,
  accstatus varchar(25) NOT NULL,
  city varchar(25) NOT NULL,
  state varchar(25) NOT NULL,
  country varchar(25) NOT NULL,
  accopendate date NOT NULL,
  lastlogin datetime NOT NULL,
  PRIMARY KEY (customerid)
);


DROP TABLE IF EXISTS employees;
CREATE TABLE IF NOT EXISTS employees (
  empid int(10) NOT NULL,
  employee_name varchar(25) NOT NULL,
  loginid varchar(25) NOT NULL,
  password varchar(25) NOT NULL,
  emailid varchar(30) NOT NULL,
  contactno varchar(30) NOT NULL,
  createdat date NOT NULL,
  last_login datetime NOT NULL,
  PRIMARY KEY (empid)
);


DROP TABLE IF EXISTS loan;
CREATE TABLE IF NOT EXISTS loan (
  loanid int(10) NOT NULL,
  loantype varchar(25) NOT NULL,
  loanamt varchar(25) NOT NULL,
  customerid int(12) NOT NULL,
  interest float(10,2) NOT NULL,
  startdate date NOT NULL,
  PRIMARY KEY (loanid)
);


DROP TABLE IF EXISTS loanpayment;
CREATE TABLE IF NOT EXISTS loanpayment (
  paymentid int(10) NOT NULL,
  date date NOT NULL,
  paidamt float(10,2) NOT NULL,
  principleamt float(10,2) NOT NULL,
  interestamt float(10,2) NOT NULL,
  balance float(10,2) NOT NULL,
  PRIMARY KEY (paymentid)
);


DROP TABLE IF EXISTS loantype;
CREATE TABLE IF NOT EXISTS loantype (
  loantype varchar(25) NOT NULL,
  prefix varchar(25) NOT NULL,
  maximumamt float(10,2) NOT NULL,
  minimumamt float(10,2) NOT NULL,
  interest float(10,2) NOT NULL,
  status varchar(25) NOT NULL
);


DROP TABLE IF EXISTS registered_payee;

CREATE TABLE IF NOT EXISTS registered_payee (
  slno decimal(11,0) NOT NULL,
  payeename varchar(25) NOT NULL,
  accountnumber varchar(25) NOT NULL,
  accounttype varchar(25) NOT NULL,
  bankname varchar(25) NOT NULL,
  ifsccode varchar(25) NOT NULL,
  PRIMARY KEY (slno)
);


DROP TABLE IF EXISTS transactions;
CREATE TABLE IF NOT EXISTS transactions (
  transactionid int(11) NOT NULL,
  paymentdate datetime NOT NULL,
  payeeid int(11) NOT NULL,
  receiveid int(11) NOT NULL,
  amount decimal(10,0) NOT NULL,
  paymentstat text NOT NULL,
  PRIMARY KEY (transactionid)
);
-- COMMIT;
ALTER TABLE accounts
    add constraint fk1_Accounts foreign key (customerid) references customers(customerid);


ALTER TABLE loan
    add constraint fk1_Loan foreign key (customerid) references customers(customerid);

ALTER Table registered_payee
    add constraint fk1_Register_Payee foreign key (accountnumber) references accounts(accno);


ALTER Table transactions
    add constraint fk1_Transactions foreign key (payeeid) references customers(customerid);

ALTER Table Transactions
    add constraint fk2_Transactions foreign key (receiveid) references customers(customerid);
