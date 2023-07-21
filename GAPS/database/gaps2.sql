CREATE TABLE user_details(
    id INT IDENTITY(1, 1),
    FullName VARCHAR(250),
    DOB VARCHAR(225),
    Email VARCHAR(250),
    MobileNo VARCHAR(250),
    Gender VARCHAR(250),
    password VARCHAR(250),
    IDType VARCHAR(250),
    IDNo VARCHAR(250),
    IssueAuthority VARCHAR(250),
    IssuedState VARCHAR(250),
    AdressLine1 VARCHAR(250),
    AdressLine2 VARCHAR(250),
    State VARCHAR(250),
    District VARCHAR(250),
    Nationality VARCHAR(250),
    Pincode INT(6),
    status VARCHAR(20) NOT NULL DEFAULT 'pending'
);

CREATE TABLE donation(
    id INT IDENTITY(1, 1),
    Name VARCHAR(250),
    Email VARCHAR(225),
    Mobile VARCHAR(250),
    Amount VARCHAR(250),
    Date VARCHAR(225),
    Gender VARCHAR(250),
    Type VARCHAR(250),
    TransactionId VARCHAR(225)
);

CREATE TABLE feedback_form(
    id INT IDENTITY(1, 1),
    FULLNAME VARCHAR(250),
    EMAIL_ID VARCHAR(225),
    FEEDBACK VARCHAR(250)
);

CREATE TABLE admin(
    id INT IDENTITY(1, 1),
    email VARCHAR(250),
    password VARCHAR(225)
);


 

