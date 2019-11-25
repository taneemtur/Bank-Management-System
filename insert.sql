INSERT INTO `branch` (`IFS_code`, `Branch_Name`, `City`, `Branch_Address`, `State`, `Country`, `PIN_Code`) VALUES ('b1', 'PIDC', 'karachi', 'Sultanabad', 's1', 'Pakistan', '123')

INSERT INTO `branch` (`IFS_code`, `Branch_Name`, `City`, `Branch_Address`, `State`, `Country`, `PIN_Code`) VALUES ('b2', 'PIDC', 'Islamabad', 'Sultanabad', 's2', 'Pakistan', '456')

INSERT INTO `customer` (`CustomerID`, `IFS_Code`, `F_Name`, `L_Name`, `Login_ID`, `Acc_Pass`, `Trans_Pass`, `Acc_Status`, `City`, `State`, `Country`, `Acc_Open_Date`, `Last_Login`) VALUES ('1', 'b1', 'Vishesh', 'Kumar', 'vishesh', '1234', '1234', 'signing', 'Karachi', 'Pakistan', 'Pakistan', '2019-11-25', '');

INSERT INTO `customer` (`CustomerID`, `IFS_Code`, `F_Name`, `L_Name`, `Login_ID`, `Acc_Pass`, `Trans_Pass`, `Acc_Status`, `City`, `State`, `Country`, `Acc_Open_Date`, `Last_Login`) VALUES ('2', 'b1', 'Taneem', 'UR', 'taneem', '1234', '1234', 'singing', 'Karachi', 'Paksitan', 'Pakistan', '2019-11-25', '0000-00-00 00:00:00')

INSERT INTO `customer` (`CustomerID`, `IFS_Code`, `F_Name`, `L_Name`, `Login_ID`, `Acc_Pass`, `Trans_Pass`, `Acc_Status`, `City`, `State`, `Country`, `Acc_Open_Date`, `Last_Login`) VALUES ('3', 'b2', 'Vimal', 'Kuamr', 'vimal', '1234', '1234', 'signing', 'Islamabad', 'Pakistan', 'Pakistan', '2019-11-25', '0000-00-00 00:00:00')

INSERT INTO `accounts` (`Account_No`, `customer_ID`, `acc_status`, `acc_open_date`, `account_type`, `account_balance`) VALUES ('1', '1', 'stable', '2019-11-25', 'Current', '120000');

INSERT INTO `account_master` (`Account_Type`, `prefix`, `Min_balance`, `interest`) VALUES ('current', '123', '500', '0.5');

INSERT INTO `employee` (`Emp_ID`, `Emp_Name`, `Login_ID`, `password`, `Email_ID`, `Contact_No`, `Create_Date`, `Last_Login`) VALUES ('1', 'Mustafa', 'mustafa', '1234', 'mustafa@gmail.com', '03332589785', '2019-11-11', '');

INSERT INTO `employee` (`Emp_ID`, `Emp_Name`, `Login_ID`, `password`, `Email_ID`, `Contact_No`, `Create_Date`, `Last_Login`) VALUES ('2', 'Danish', 'danish', '1234', 'danish@yahoo.com', '03332589787', '2019-11-06', '');

INSERT INTO `loan` (`Loan_ID`, `Loan_Type`, `Loan_Amount`, `Customer_ID`, `Interest`, `Start_Date`) VALUES ('1', 'car', '25000', '1', '0.3', '2019-11-25');

INSERT INTO `loan` (`Loan_ID`, `Loan_Type`, `Loan_Amount`, `Customer_ID`, `Interest`, `Start_Date`) VALUES ('2', 'house', '15000', '1', '0.3', '2019-11-25');

INSERT INTO `loan` (`Loan_ID`, `Loan_Type`, `Loan_Amount`, `Customer_ID`, `Interest`, `Start_Date`) VALUES ('3', 'house', '15000', '2', '0.30', '2019-11-25')

INSERT INTO `loan_payment` (`Payment_ID`, `Date`, `Paid_Amount`, `Principle_Amount`, `Balance`) VALUES ('1', '2019-11-26', '1000', '1000', '12000');

INSERT INTO `loan_type` (`Loan_Type`, `prefix`, `Max_Amount`, `Min_Amount`, `Interest`, `status`) VALUES ('Hajj', '50000', '100000', '5000', '0.3', 'stable');

INSERT INTO `register_payee` (`SL_No`, `Payee_Name`, `Account_No`, `Account_Type`, `Bank_Name`, `IFS_Code`) VALUES ('1', 'vishesh', '1', 'current', 'AL-Habib', 'b1');

INSERT INTO `register_payee` (`SL_No`, `Payee_Name`, `Account_No`, `Account_Type`, `Bank_Name`, `IFS_Code`) VALUES ('2', 'Taneem', '2', 'current', 'AL-Habib', 'b1')

INSERT INTO `transactions` (`Transaction_ID`, `Payment_Date`, `Payee_ID`, `Recieve_ID`, `Amount`, `Payment_State`) VALUES ('1', '2019-11-25 10:13:19', '1', '2', '1000', 'pending');
