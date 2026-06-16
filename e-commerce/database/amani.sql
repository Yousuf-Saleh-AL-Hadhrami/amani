



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
