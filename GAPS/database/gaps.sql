CREATE TABLE admin(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(55),
    password VARCHAR(55),
    Name VARCHAR(55),
    Mobile INT(12)
);


CREATE TABLE personalDetails(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(250),
    DOB VARCHAR(225),
    Email VARCHAR(250),
    MobileNo INT(12),
    Gender VARCHAR(250),
    Occuption VARCHAR(250)
);

CREATE TABLE IdentityDetails(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    IDType VARCHAR(250),
    IDNo VARCHAR(250),
    IssueAuthority VARCHAR(250),
    IssuedState VARCHAR(250)
);

CREATE TABLE AddressDetails(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    AdressLine1 VARCHAR(250),
    AdressLine2 VARCHAR(250),
    State VARCHAR(250),
    District VARCHAR(250),
    Nationality VARCHAR(250),
    Pincode INT(6)
);

CREATE TABLE FamilyDetails(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FathersName VARCHAR(250),
    MothersName VARCHAR(250),
    Email VARCHAR(250),
    MobileNo INT(12),
    GuardianNo INT(12),
    GuardianEmail VARCHAR(250)
);

CREATE TABLE Donation(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(250),
    Mobile INT(12),
    Email VARCHAR(250),
    TransactionId VARCHAR(250)
);

