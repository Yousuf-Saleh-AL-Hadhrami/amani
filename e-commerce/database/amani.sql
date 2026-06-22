

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE users ADD COLUMN role ENUM('admin','user') DEFAULT 'user';

 CREATE TABLE departments(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
 );

  CREATE TABLE IF NOT EXISTS employees(
     id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
     name VARCHAR(100),
     dob DATE,
     dept_id INT UNSIGNED,
     CONSTRAINT fk_dept_id FOREIGN KEY(dept_id) REFERENCES departments(id)
     );


    ALTER TABLE departments ADD CONSTRAINT fk_dept_mgr FOREIGN KEY(deptmgr) REFERENCES employees(id);



    #SELECT employees.name, departments.dname, employees.name AS manager FROM employees INNER JOIN departments 
    #ON
     #employees.dept_id = departments.id
     #AND 
     #employees.id = departments.deptmgr


     CREATE TABLE categories(
     id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
     category_name VARCHAR(255),
     description TEXT
     );


     CREATE TABLE products(
     id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
     product_name VARCHAR(255),
     description TEXT,
     price DECIMAL(5.2),
     category_id INT UNSIGNED,
     FOREIGN KEY(category_id) references categories(id) ON UPDATE CASCADE ON DELETE CASCADE
     );


     ALTER TABLE products ADD COLUMN image VARCHAR(100);



