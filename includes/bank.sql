
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


INSERT INTO accountmaster (accounttype, prefix, minbalance, interest) VALUES 
('current', 'cur', 500, 0.5),
('Savings', 'sv', 4000.00, 1.5),
('Student', 'stu', 500.00, 2.00);


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


INSERT INTO `accounts` (`accno`, `customerid`, `accstatus`, `accopendate`, `accounttype`, `accountbalance`) VALUES
('415236', 98682, 'active', '2013-02-02', 'Savings', 12574.00),
('516267', 98680, 'active', '2013-02-02', 'Current', 1000000.00),
('78312', 98683, 'active', '2013-02-09', 'Savings', 5000.00);


DROP TABLE IF EXISTS branch;
CREATE TABLE IF NOT EXISTS branch (
  iban varchar(25) NOT NULL,
  branchname varchar(50) NOT NULL,
  city varchar(25) NOT NULL,
  branchaddress text NOT NULL,
  state varchar(25) NOT NULL,
  country varchar(25) NOT NULL,
  pincode int(11) NOT NULL,
  PRIMARY KEY (iban)
);

INSERT INTO `branch` (`iban`, `branchname`, `city`, `branchaddress`, `state`, `country`, `pincode`) VALUES
('KHI2345', 'Head office', 'Karachi', 'National Highway 5', 'Sindh', 'Pakistan', 122413),
('ISL1234', 'Head office', 'Islamabad', 'Express Highway', 'Punjab', 'Pakistan', 155200);


DROP TABLE IF EXISTS customers;
CREATE TABLE IF NOT EXISTS customers (
  customerid int(10) NOT NULL,
  iban varchar(25) NOT NULL,
  firstname varchar(25) NOT NULL,
  lastname varchar(25) NOT NULL,
  emailid varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  transpassword varchar(50) NOT NULL,
  accstatus varchar(25) NOT NULL,
  city varchar(25) NOT NULL,
  state varchar(25) NOT NULL,
  country varchar(25) NOT NULL,
  accopendate date NOT NULL,
  lastlogin datetime NOT NULL,
  PRIMARY KEY (customerid)
);


INSERT INTO `customers` (`customerid`, `iban`, `firstname`, `lastname`, `emailid`, `password`, `transpassword`, `accstatus`, `city`, `state`, `country`, `accopendate`, `lastlogin`) VALUES
(98680, 'KHI2345', 'Ali', 'Zafar', 'ali@gmail.com', 'ali', '12345', 'ACTIVE', 'Karachi', 'Sindh', 'Pakistan', '2019-02-02', '2019-07-06 06:23:03'),
(98682, 'KHI2345', 'Rafay', 'Marif', 'rafay@gmail.com', 'rafay', '12345', 'ACTIVE', 'Karachi', 'Sindh', 'Pakistan', '2019-02-02', '2019-07-03 05:54:11'),
(98683, 'ISL1234', 'Talha', 'Habib', 'talha@gmail.com', 'talha', '12345', 'ACTIVE', 'Islamabad', 'Sindh', 'Pakistan', '2019-02-09', '2019-07-04 08:37:40');

DROP TABLE IF EXISTS employees;
CREATE TABLE IF NOT EXISTS employees (
  empid int(10) NOT NULL,
  empname varchar(25) NOT NULL,
  password varchar(25) NOT NULL,
  emailid varchar(30) NOT NULL,
  contactno varchar(30) NOT NULL,
  createdat date NOT NULL,
  last_login datetime NOT NULL,
  PRIMARY KEY (empid)
);


INSERT INTO `employees` (`empid`, `empname`,  `password`, `emailid`, `contactno`, `createdat`, `last_login`) VALUES 
(313786, 'Mustafa', '1234', 'mustafa@gmail.com', '03332589785', '2019-11-11', '0000-00-00 00:00:00'),
(313787, 'Danish', '1234', 'danish@yahoo.com', '03332589787', '2019-11-06', '0000-00-00 00:00:00');


DROP TABLE IF EXISTS loan;
CREATE TABLE IF NOT EXISTS loan (
  loanid int(10) NOT NULL,
  loantype varchar(25) NOT NULL,
  loanamount varchar(25) NOT NULL,
  customerid int(12) NOT NULL,
  interest float(10,2) NOT NULL,
  startdate date NOT NULL,
  PRIMARY KEY (loanid)
);


DROP TABLE IF EXISTS loanpayment;
CREATE TABLE IF NOT EXISTS loanpayment (
  paymentid int(10) NOT NULL,
  date date NOT NULL,
  paidamount float(10,2) NOT NULL,
  principleamount float(10,2) NOT NULL,
  interestamount float(10,2) NOT NULL,
  balance float(10,2) NOT NULL,
   PRIMARY KEY (paymentid)
);


INSERT INTO `loanpayment` (`paymentid`, `date`, `paidamount`, `principleamount`, `balance`) VALUES
(2147483647, '2019-11-26', 10000.00, 1000, 12000);

DROP TABLE IF EXISTS loantype;
CREATE TABLE IF NOT EXISTS loantype (
  loantype varchar(25) NOT NULL,
  prefix varchar(25) NOT NULL,
  maximumamount float(10,2) NOT NULL,
  minimumamount float(10,2) NOT NULL,
  interest float(10,2) NOT NULL,
  status varchar(25) NOT NULL
);



INSERT INTO `loantype` (`loantype`, `prefix`, `maximumamount`, `minimumamount`, `interest`, `status`) VALUES
('Car', 'car', 100000000.00, 100000.00, 8.00, ''),
('Current', 'cr', 70000.00, 50000.00, 3000.00, 'active'),
('homeloan', 'hl', 1000000.00, 50000.00, 65.09, 'active');


DROP TABLE IF EXISTS registered_payee;
CREATE TABLE IF NOT EXISTS registered_payee (
  slno int(11) NOT NULL,
  payeename varchar(25) NOT NULL,
  accno varchar(25) NOT NULL,
  accounttype varchar(25) NOT NULL,
  bankname varchar(25) NOT NULL,
  iban varchar(25) NOT NULL,
  PRIMARY KEY (slno)
);


INSERT INTO `registered_payee` (`slno`, `payeename`, `accno`, `accounttype`, `bankname`, `iban`) VALUES
(67543, 'Vishesh', '126548', 'Current', 'AL-Habib', 'PSH1234'),
(67544, 'Kashif', '265487', 'Saving', 'HBL', 'HYD2133');


DROP TABLE IF EXISTS transactions;
CREATE TABLE IF NOT EXISTS transactions (
  transactionid int(11) NOT NULL,
  paymentdate datetime NOT NULL,
  payeeid int(11) NOT NULL,
  receiveid int(11) NOT NULL,
  amount decimal(10,0) NOT NULL,
  paymentstate text NOT NULL,
  PRIMARY KEY (transactionid)
);


INSERT INTO `transactions` (`transactionid`, `paymentdate`, `payeeid`, `receiveid`, `amount`, `paymentstate`) VALUES
(1, '2019-07-03 12:16:15', 4666, 67543, 1234, 'active'),
(2, '2019-07-03 05:40:33', 98683, 67543, 2232, 'active'),
(3, '2019-07-03 07:45:13', 98683, 67543, 10212, 'active');

ALTER TABLE accounts
    add constraint fk1_Accounts foreign key (customerid) references customers(customerid);

ALTER TABLE customers
    add constraint fk1_Customer foreign key (iban) references branch(iban);

ALTER TABLE loan
    add constraint fk1_Loan foreign key (customerid) references customers(customerid);

ALTER Table registered_payee
    add constraint fk1_Register_Payee foreign key (accno) references accounts(accno);

ALTER Table registered_payee
    add constraint fk2_Register_Payee foreign key (iban) references branch(iban);

ALTER Table transactions
    add constraint fk1_Transactions foreign key (payeeid) references customers(customerid);

ALTER Table Transactions
    add constraint fk2_Transactions foreign key (receiveid) references customers(customerid);


ALTER TABLE `customers`
  MODIFY `customerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98684;

ALTER TABLE `employees`
  MODIFY `empid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313800;

ALTER TABLE `loan`
  MODIFY `loanid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `loanpayment`
  MODIFY `paymentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

ALTER TABLE `registered_payee`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67545;

ALTER TABLE `transactions`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

