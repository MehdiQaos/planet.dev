DROP DATABASE IF EXISTS tinymcetest;
CREATE DATABASE tinymcetest;

use tinymcetest;

CREATE TABLE Roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE Categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES Roles(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE table articles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    body TEXT,
    category_id INT,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    FOREIGN KEY (category_id) REFERENCES Roles(id) ON DELETE CASCADE ON UPDATE CASCADE
);