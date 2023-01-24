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

CREATE table Articles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    body TEXT,
    category_id INT,
    author_id INT,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    FOREIGN KEY (author_id) REFERENCES Users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (category_id) REFERENCES Categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Roles (name)
VALUES ("admin"),
       ("writer"),
       ("reader");

INSERT INTO Users (firstname, lastname, email, password, role_id)
           VALUES ("Mehdi", "Qaos", "mehdi.qaos@youcode.ma", "123456", 1);

INSERT INTO Categories (name)
VALUES ("Algorithm"), ("Database"), ("UI/UX Design"), ("DevOps"), ("Blockchain"), ("Game development"), ("Virtual Reality"), ("Augmented Reality"), ("5G technology"), ("Quantum computing"), ("Programming languages"), ("Web development"), ("Cloud computing"), ("Artificial intelligence"), ("Cybersecurity"), ("Data privacy"), ("Software development"), ("Mobile apps"), ("Internet of Things");

INSERT INTO Users (firstname, lastname, email, password, role_id) VALUES
  ('Emily', 'Dickinson', 'edickinson@email.com', 'password1', 2),
  ('J.K.', 'Rowling', 'jrowling@email.com', 'password2', 2),
  ('James', 'Baldwin', 'jbaldwin@email.com', 'password3', 2),
  ('Maya', 'Angelou', 'mangelou@email.com', 'password4', 2),
  ('George', 'Orwell', 'gorwell@email.com', 'password5', 2),
  ('Ernest', 'Hemingway', 'ehemingway@email.com', 'password6', 2),
  ('Toni', 'Morrison', 'tmorrison@email.com', 'password7', 2),
  ('Jane', 'Austen', 'jausten@email.com', 'password8', 2),
  ('Stephen', 'King', 'sking@email.com', 'password9', 2),
  ('Gabriel', 'Garcia Marquez', 'ggarcia@email.com', 'password10', 2),
  ('Virginia', 'Woolf', 'vwoolf@email.com', 'password11', 2),
  ('F. Scott', 'Fitzgerald', 'ffitzgerald@email.com', 'password12', 2),
  ('J.R.R.', 'Tolkien', 'jtolkien@email.com', 'password13', 2),
  ('Sylvia', 'Plath', 'splath@email.com', 'password14', 2),
  ('Mark', 'Twain', 'mtwain@email.com', 'password15', 2),
  ('Harold', 'Pinter', 'hpinter@email.com', 'password16', 2),
  ('Langston', 'Hughes', 'lhughes@email.com', 'password17', 2),
  ('Samuel', 'Beckett', 'sbeckett@email.com', 'password18', 2),
  ('Zadie', 'Smith', 'zsmith@email.com', 'password19', 2),
  ('William', 'Faulkner', 'wfaulkner@email.com', 'password20', 2);
