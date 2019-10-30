<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_project";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE Branch (
    BranchID int primary KEY,
    BranchName varchar(40),
    ManagerID int,
    Branch_City varchar(40),
    Branch_Country varchar(40)
);";

$sql .= "ALTER TABLE Branch
    add constraint fk_Branch foreign key (ManagerID) REFERENCES Employee(SSN);";

$sql .= "CREATE TABLE Bank (
    BankName varchar(40),
    BranchID int,
    ATM varchar(40),
    Services varchar(40)
);";

$sql .= "ALTER TABLE Bank 
    add constraint fk_bank foreign key (BranchID) references Branch(BranchID);";
    
$sql .= "CREATE TABLE Customer (
    CustomerID int primary key,
    Fname varchar(40),
    Lname varchar(40),
    AccountNo int
);";

$sql .= "CREATE TABLE Accounts(
    AccountNo int primary key,
    CustomerID int,
    BankBranch int,
    status varchar(40),
    AccountTitle varchar(40)
);";

$sql .= "ALTER TABLE Accounts
    add constraint fk1_Accounts foreign key (CustomerID) REFERENCES Customer(customerID);";

$sql .= "ALTER TABLE Accounts 
    add constraint fk2_Accounts foreign key (BankBranch) REFERENCES Branch(BranchID);";

$sql .= "ALTER TABLE Customer
    add constraint fk1_Customer foreign key (AccountNo) REFERENCES Accounts(AccountNo);";

$sql .= "CREATE TABLE Employee (
    SSN int primary key,
    Fname varchar(40),
    Lname varchar(40),
    AccountNo int,
    BranchID int,
    EmployeePost varchar(40),
    Salary int
);";

$sql .= "ALTER TABLE Employee
    add constraint fk1_Employee foreign key (AccountNo) REFERENCES Accounts(AccountNo);";

$sql .= "ALTER TABLE Employee 
    add constraint fk2_Employee foreign key (BranchID) REFERENCES Branch(BranchID);";

$sql .= "CREATE TABLE Loan (
    LoanID int primary key,
    AccountNo int,
    StartDate date,
    InterestRate int,
    DueAmount int
);";

$sql .= "ALTER TABLE Loan
    add constraint fk_Loan foreign key (AccountNo) REFERENCES Accounts(AccountNo);";

$sql .= "CREATE TABLE Transaction (
    TransactionID int primary key,
    AccountNo int,
    AccountType varchar(40),
    SSN int,
    Duration_ date,
    LoanID int,
    Amount int
);";

$sql .= "ALTER TABLE Transaction
    add constraint fk1_Transaction foreign key (AccountNo) REFERENCES Accounts(AccountNo);";

$sql .= "ALTER TABLE Transaction
    add constraint fk2_Transaction foreign key (SSN) REFERENCES Employee(SSN);";

$sql .= "ALTER TABLE Transaction
    add constraint fk3_Transaction foreign key (LoanID) REFERENCES Loan(LoanID);";
    
$sql .= "CREATE TABLE DebitCard (
    CardNo int primary key,
    Card_Type varchar(40),
    Credit_Verification_Code int,
    Status varchar(40),
    POS_Range int,
    Withdrawl_Range int,
    AccountNo int
);";

$sql .= "ALTER TABLE DebitCard
    add constraint fk_DebitCrad foreign key (AccountNo) references Accounts(AccountNo);";

$sql .= "CREATE TABLE Contact (
    CustomerID int,
    SSN int,
    PhoneNo varchar(11) primary KEY
);";

$sql .= "ALTER TABLE Contact 
    add constraint fk1_Contact foreign key (CustomerID) references Customer(CustomerID);";

$sql .= "ALTER TABLE Contact 
    add constraint fk2_Contact foreign key (SSN) references Employee(SSN);";

$sql .= "ALTER TABLE Customer
    add Address varchar(40);";

$sql .= "ALTER TABLE Employee
    add Address varchar(40);";
    
$sql .= "ALTER TABLE Bank
    modify BankName varchar(40) NOT NULL;";
    
$sql .= "ALTER TABLE Accounts
    modify AccountTitle varchar(40) NOT NULL;";
    
$sql .= "ALTER TABLE Branch
    modify BranchName varchar(40) NOT NULL;";

if($conn->multi_query($sql) == TRUE)
{
    echo "Table created successfully";
}
else
{
    echo "Error creating Table: " . $conn->error;
}
$conn->close();
?>

?>