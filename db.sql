DROP DATABASE IF EXISTS planetdevDB;
-- DROP DATABASE IF EXISTS tinymcetest;
CREATE DATABASE planetdevDB;
-- CREATE DATABASE tinymcetest;
use planetdevDB;
-- use tinymcetest;

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
    created_at datetime NOT NULL,
    updated_at datetime,
    -- deleted_at datetime,
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

INSERT INTO `articles` (`title`, `body`, `category_id`, `author_id`, `created_at`, `updated_at`) VALUES
('Why Vue js?', '<h1>Why Vue js?</h1>\n<p>Vue.js is a JavaScript framework that is used to build user interfaces and single-page applications. It is a lightweight and easy-to-learn framework that is quickly gaining popularity in the web development community. Vue.js was created by Evan You in 2014 and is now maintained by a team of developers from around the world.</p>\n<h2>Key Features of Vue.js</h2>\n<p>One of the key features of Vue.js is its reactivity system. This system allows for easy data binding, which means that any changes made to the data in the application will be reflected in the user interface automatically. Vue.js also has a powerful template system that allows for easy and efficient rendering of data. Additionally, Vue.js has a built-in directive system that allows for easy manipulation of the DOM.</p>\n<h2>Advantages of Using Vue.js</h2>\n<p>Vue.js is a great choice for building small to medium-sized applications. It is easy to learn and has a small footprint, making it ideal for beginners. Additionally, Vue.js is highly customizable and can be easily integrated with other libraries and frameworks. This makes it a great choice for building complex applications. Furthermore, Vue.js has a large and active community, which means that there are plenty of resources and tutorials available to help developers learn and use the framework.</p>\n<h2>Conclusion</h2>\n<p>In conclusion, Vue.js is a great choice for building user interfaces and single-page applications. Its reactivity system, powerful template system, and built-in directive system make it a versatile and efficient framework. Additionally, Vue.js is easy to learn and customize, making it perfect for beginners and experienced developers alike. With a large and active community, developers can easily find resources and support to help them build their applications. Overall, Vue.js is a great choice for anyone looking to build web applications.</p>', 12, 2, '2023-01-24 19:52:17', NULL),
('React js', '<div class=\"w-full border-b border-black/10 dark:border-gray-900/50 text-gray-800 dark:text-gray-100 group bg-gray-50 dark:bg-[#444654]\">\n<div class=\"text-base gap-4 md:gap-6 m-auto md:max-w-2xl lg:max-w-2xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0\">\n<div class=\"relative flex w-[calc(100%-50px)] md:flex-col lg:w-[calc(100%-115px)]\">\n<div class=\"flex flex-grow flex-col gap-3\">\n<div class=\"min-h-[20px] flex flex-col items-start gap-4 whitespace-pre-wrap\">\n<div class=\"markdown prose w-full break-words dark:prose-invert dark\">\n<p>ReactJS is a popular JavaScript library that is used to build user interfaces. Developed by Facebook in 2011, React quickly gained popularity among developers due to its efficient performance and ability to handle large, complex web applications.</p>\n<p>One of the key features of React is its ability to break down a user interface into small, reusable components. This allows developers to easily manage and update specific sections of a web page, without having to rewrite the entire page.</p>\n<p>React also uses a virtual DOM, which is a lightweight version of the actual DOM (Document Object Model). This allows React to update only the specific parts of the DOM that have changed, rather than re-rendering the entire page, leading to faster performance.</p>\n<p>Another feature that makes React popular is its ability to handle both client-side and server-side rendering, allowing for faster load times and improved SEO.</p>\n<p>In addition to these core features, React also has a large and active community of developers who contribute to the development of the library and create open-source libraries and tools that work with React.</p>\n<p>However, React is not without its limitations. It is a view-layer library, and it does not include features for handling routing, state management, and other features commonly needed for building web applications. This means that developers often need to use additional libraries and frameworks to build a complete web application.</p>\n<p>Overall, React is a powerful and efficient tool for building user interfaces that has become a popular choice among developers. Its ability to break down a user interface into reusable components, efficient performance, and support for both client-side and server-side rendering make it an ideal choice for building large, complex web applications.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>', 14, 2, '2022-11-24 11:30:24', NULL),
('Why Rust is the Next best Programming Language?', '<h2>Why Rust is the Next best Programming Language?</h2>\n<p>Rust is a relatively new programming language that has quickly gained popularity among developers. It was first released in 2010 and has since become one of the most loved languages according to the annual Stack Overflow Developer Survey. In this article, we will discuss why Rust is the next programming language and how it stands out from other languages.</p>\n<h3>Performance and Safety</h3>\n<p>Rust is known for its performance and safety features. It is designed to be a low-level language, which means it can be used for systems programming. This allows for faster and more efficient code, as well as the ability to access hardware directly. Rust also has a strong focus on safety, with its ownership model and borrow checker ensuring that memory is used efficiently and safely. This makes Rust a great choice for systems that require a high level of performance and reliability, such as operating systems, browsers, and embedded systems.</p>\n<h3>Ease of Use and Community Support</h3>\n<p>Rust has a relatively low learning curve, making it easy for developers to pick up and start using. The language is designed with a focus on readability and simplicity, and the community has created many resources to help newcomers get started. The Rust community is also very active and supportive, with many events, meetups, and online resources available to help developers learn and grow. This makes Rust a great choice for developers of all skill levels.</p>\n<h3>Conclusion</h3>\n<p>Rust is a powerful programming language that offers a unique combination of performance and safety. Its low-level nature makes it a great choice for systems programming, while its ease of use and community support make it accessible to developers of all skill levels. With its growing popularity and support, Rust is well on its way to becoming the next programming language of choice.</p>', 11, 4, '2023-01-24 19:59:23', NULL);