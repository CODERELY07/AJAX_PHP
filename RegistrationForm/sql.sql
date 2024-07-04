CREATE TABLE user{
    id int not null AUTO_INCREMENT,
    firstname varchar(255) not null,
    lastname varchar(255)not null,
    email varchar(150) not null,
    password varchar(200) not null,
    image varchar(150) not null,
    PRIMARY KEY (id)
}