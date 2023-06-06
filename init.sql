-- Create the 'users' table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  company_name VARCHAR(50),
  company_id VARCHAR(50)
);

-- Insert data into the 'users' table
INSERT INTO users (company_name, company_id) VALUES ('125', 'Skai');
INSERT INTO users (company_name, company_id) VALUES ('455', 'Tesla');

-- Create the 'Account' table
CREATE TABLE Account (
  id INT AUTO_INCREMENT PRIMARY KEY,
  account_id VARCHAR(50),
  account_name VARCHAR(50)
  
);

-- Insert data into the 'Account' table
INSERT INTO Account (account_id, account_name) VALUES ('111', 'Admin');
INSERT INTO Account (account_id, account_name) VALUES ('112', 'User1');

-- Create the 'Project' table
CREATE TABLE Project (
  id INT AUTO_INCREMENT PRIMARY KEY,
  project_id VARCHAR(50),
  project_name VARCHAR(50),
  project_status VARCHAR(50)

);

-- Insert data into the 'Project' table
INSERT INTO Project (project_id, project_name, project_status) VALUES ('154', 'Upgrade', 'Active');



