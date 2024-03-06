create database employee_demo;

use employee_demo;

--
-- Phase A: employee and payroll
--
-- CREATE

CREATE TABLE employee (
    employee_id INT PRIMARY KEY,
    last_name VARCHAR(255),
    first_name VARCHAR(255),
    address VARCHAR(255),
    city VARCHAR(255),
    state CHAR(2),
    zip CHAR(5)
);

CREATE TABLE payroll (
    employee_id INT PRIMARY KEY,
    start_date YEAR,
    pay_rate DECIMAL(10, 2),
    health_coverage VARCHAR(255),
    year_vested VARCHAR(255),
    401k BOOLEAN,
    FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
);

-- INSERT 

-- Insert statements for Employees table
INSERT INTO employee (employee_id, last_name, first_name, address, city, state, zip) VALUES
(101, 'Blair', 'Dennis', '204 Spruce Lane', 'Brookfield', 'MA', '01506'),
(102, 'Hernandez', 'Louis', '68 Boston Post Road', 'Spencer', 'MA', '01562'),
(103, 'Miller', 'Erica', '271 Baker Hill Road', 'Brookfield', 'MA', '01515'),
(104, 'Morinaga', 'Scott', '17 Ashley Road', 'Brookfield', 'MA', '01515'),
(105, 'Picard', 'Raymond', '1113 Oakham Road', 'Barre', 'MA', '01531');

-- Insert statements for Payroll table
INSERT INTO payroll (employee_id, start_date, pay_rate, health_coverage, year_vested, 401k) VALUES
(101, 2002, '21.25', 'none', NULL, FALSE),
(102, 1999, '28.00', 'Family Plan', '2001', TRUE),
(103, 1997, '24.50', 'Individual', NULL, TRUE),
(104, 1994, '36.00', 'Family Plan', '1996', TRUE),
(105, 1995, '31.00', 'Individual', '1997', TRUE);

--
-- Phase B: Added language 
--
-- Create statement for language table
CREATE TABLE language (
    language_id INT PRIMARY KEY,
    language VARCHAR(255)
);

-- Create statement for Experience table
CREATE TABLE experience (
    employee_id INT,
    language_id INT,
    years INT,
    PRIMARY KEY (employee_id, language_id),
    FOREIGN KEY (employee_id) REFERENCES employee(employee_id),
    FOREIGN KEY (language_id) REFERENCES language(language_id)
);


-- INSERT statements
-- Insert statements for Languages table
INSERT INTO language (language_id, language) VALUES
(10, 'JavaScript'),
(11, 'ASP.NET'),
(12, 'Java'),
(13, 'C++');

-- Insert statements for Experience table
INSERT INTO experience (employee_id, language_id, years) VALUES
(101, 10, 5),
(101, 11, 4),
(102, 10, 3),
(102, 11, 2),
(102, 12, 3),
(103, 10, 2),
(103, 11, 3),
(103, 12, 6),
(103, 13, 1),
(104, 10, 7),
(104, 11, 5),
(104, 12, 8),
(105, 10, 4),
(105, 11, 2);
