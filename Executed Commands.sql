CREATE TABLE `login_info` (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
F_Name VARCHAR(30) NOT NULL,
U_Name VARCHAR(30) NOT NULL,
Pass VARCHAR(30) NOT NULL,
e_mail VARCHAR(50),
mob VARCHAR (13)
)


insert into login_info VALUES(1,'Saurabh Mahajan','msaurabh','sai123','msaurabh50702@gmail.com','9158342110')

select * from login_info

DELETE FROM login_info
WHERE id = 3


CREATE TABLE `file` (
    `id`        Int Unsigned Not Null Auto_Increment,
    `name`      VarChar(255) Not Null Default 'Untitled.txt',
    `mime`      VarChar(50) Not Null Default 'text/plain',
    `size`      BigInt Unsigned Not Null Default 0,
    `data`      MediumBlob Not Null,
    `created`   DateTime Not Null,
    `username`  VarChar(50) Not Null,
    `pass`      VarChar(50) Not Null,
    PRIMARY KEY (`id`)
)
 