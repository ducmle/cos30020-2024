# Strings
## Reference:
### PHP manual
1. Strings:
https://www.php.net/manual/en/language.types.string.php
2. Regular expression: https://www.php.net/manual/en/book.pcre.php
   1. Regular expression syntax: https://www.php.net/manual/en/pcre.pattern.php 
   2. PCRE functions: https://www.php.net/manual/en/ref.pcre.php
3. Comparison operators: https://www.php.net/manual/en/language.operators.comparison.php

# XAMPP, PHP, sendmail

## Reference: 
https://stackoverflow.com/questions/38842072/how-can-i-setup-xampp-for-smtp-outgoing-email-on-a-unix-machine.

1. install sendmail
`sudo apt-get install sendmail`
2. edit `[mail function` in the `$XAMPP/etc/php.ini` file: 
```
    SMPT=smtp.gmail.com
    smtp_port=587
    sendmail_from=your@gmail.com
    sendmail_path=/usr/sbin/sendmail -t -i
```
3. `sudo sendmailconfig`, answer `Y` to all questions

4. Make new directory:
   
`sudo mkdir -m 700 /etc/mail/authinfo && sudo sh -c 'cd /etc/mail/authinfo'`

5. Create new file:

`sudo touch ./gmail-auth`

6. Insert following content:

```
AuthInfo: "U:YOUR ACCOUNT NAME" "I:YOUR GMAIL EMAIL ADDRESS" "P:YOUR GMAIL PASSWORD"
```
7. Create new hash map:

`makemap hash gmail-auth < gmail-auth`

8. Open /etc/mail/sendmail.mc and above first MAILER definition add:

```define(`SMART_HOST',`[smtp.gmail.com]')dnl
define(`RELAY_MAILER_ARGS', `TCP $h 587')dnl
define(`ESMTP_MAILER_ARGS', `TCP $h 587')dnl
define(`confAUTH_OPTIONS', `A p')dnl
TRUST_AUTH_MECH(`EXTERNAL DIGEST-MD5 CRAM-MD5 LOGIN PLAIN')dnl
define(`confAUTH_MECHANISMS', `EXTERNAL GSSAPI DIGEST-MD5 CRAM-MD5    LOGIN PLAIN')dnl
FEATURE(`authinfo',`hash -o /etc/mail/authinfo/gmail-auth')dnl```

9. Rebuild configuration and restart sendmail service

`sudo make -C /etc/mail && sudo service sendmail restart`