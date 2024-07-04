-- database name
membershipsystem
-- Create Table
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fistname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
)