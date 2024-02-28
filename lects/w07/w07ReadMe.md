# MariaDB
## MariaDB vs. MySQL
Read this: https://mariadb.com/database-topics/mariadb-vs-mysql/

# Metadata schemas/databases
1. [Information_Schema](http://underpop.online.fr/m/mysql/manual/information-schema.html#:~:text=The%20name%20of%20the%20database,tables%20such%20as%20INFORMATION%2DSCHEMA.)
2. [Performance_Schema](https://mariadb.com/kb/en/performance-schema-overview/#:~:text=The%20Performance%20Schema%20is%20a%20feature%20for%20monitoring%20server%20performance.)

# Managing XAMPP MySQL database server from the command line

- start the server:
  
  `# xampp startmysql`

- stop the server:

  `# xampp stopmysql`

# Connecting to a database from the command line
- database name: `test`
- command: 

  `# $XAMPP/bin/mysql -u admin -p test`

  (enter the password when prompted)

- The MySQL prompt should look like this:

  `MariaDB [test]> `

# MySQL documentation
URL: https://dev.mysql.com/doc/refman/8.0/en/

## Common commands
```
> show databases;
> show tables;
[test]> desc inventory;
```

## execute a SQL file from inside mysql
- Command: `source`
- Example:

```
[test]> source /data/projects/swinburne/2022/2-Summer/COS30020-WebAppDev/dev/www/w07/sql/inventory.sql
```

## Data types
URL: https://dev.mysql.com/doc/refman/8.0/en/data-types.html

- Date type: https://dev.mysql.com/doc/refman/8.0/en/datetime.html
- Time type: https://dev.mysql.com/doc/refman/8.0/en/time.html
- Numeric data types: https://dev.mysql.com/doc/refman/8.0/en/numeric-type-syntax.html

## OWASP Top 10 Security risks in 2021!
URL: https://owasp.org/www-project-top-ten/

A1:2017-Injection

A2:2017-Broken Authentication

A3:2017-Sensitive Data Exposure

A4:2017-XML External Entities (XXE)

A5:2017-Broken Access Control

A6:2017-Security Misconfiguration

A7:2017-Cross-Site Scripting XSS

A8:2017-Insecure Deserialization

A9:2017-Using Components with Known Vulnerabilities

A10:2017-Insufficient Logging & Monitoring

## The Six Dumbest Ideas in Computer Security 
URL: https://www.cs.clemson.edu/course/cpsc420/material/Papers/The%20Six%20Dumbest%20Ideas%20in%20Computer%20Security.pdf

