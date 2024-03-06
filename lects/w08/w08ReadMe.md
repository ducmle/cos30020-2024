# MySQLi extension functions
**Reference**: 
- https://www.php.net/manual/en/mysqli.summary.php
- https://www.php.net/manual/en/mysqli.overview.php
  - Section: What is PHP's mysqli Extension?

# To run the lecture code
1. Ensure that folder `util` is available on the same directory level as `w08`
2. Ensure that the database has been set up correctly:
   1. user/password: admin/password
   2. database: `test`
      1. contains 2 tables: `cars` and `inventory`, which have been populated with data from Lab-7

# To view the server-side error
- PHP-related errors are recorded in this file on the XAMPP server:
  `$XAMPP/logs/php_error_log`

- On Linux: `tail f $XAMPP/logs/php_error_log` to view most recent error messages

# MySQL
- check if a table named `'inventory'` exists: `show tables like 'inventory'`
