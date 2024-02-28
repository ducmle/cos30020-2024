-- Create a database
show databases;

create database test;

use test;

-- Create a user

create user 'student'@'localhost' identified by 'student';

-- grant privileges
-- Connect to mysql as user `root` (default: no password):
mysql -u root

-- - for `admin` user to access `mysql` database

grant all on mysql.* to 'admin'@'localhost';
flush privileges;

-- - for `admin` user to create database

grant create on *.* to 'admin'@'localhost';

-- - for `admin` user to manipulate a database

grant all on test.* to 'admin'@'localhost';

-- - for `student`:
grant all on test.* to 'student'@'localhost';

-- revoke privileges
-- - for `admin`

revoke all privileges on mysql.* from 'admin'@'localhost';
flush privileges;
