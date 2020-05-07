CREATE TABLE Users(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(256),
    email varchar(256),
    password varchar(256)
);

INSERT INTO Users(name, email, password) values ("admin", "admin@email.com", "password");