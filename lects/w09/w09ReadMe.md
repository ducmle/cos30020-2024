# RFC 6265: HTTP State Management Mechanism
URL: https://datatracker.ietf.org/doc/rfc6265/
- Session 6.1: Limits on cookies

# Session state management
- An extra step is needed to remove session id from the client (see `sessionend.php`)
- Location of session file on Xampp server: 
  - Open localhost on browser and Choose "PHPInfo" on the dashboard
  - Search `save_path` to locate the path

# Browser's state management
To view the state information on the Browser:
- Press F12 to open the developer console (on Chrome)
- For hidden input field: 
  - open the Sources table and click on the page node to view its source code and the hidden field
- For cookies: 
  - Firefox :open the Application tab, scroll down to Storage and then Cookies
  - Edge: Click "+" and choose "Application" to add this tab
    - On LHS menu, scrolldown to Storage/Cookies
    - On the Value panel, tick "Show URL decoded" checkbox to show the user-friendly value

- Cookie Expire time on Browser: 
  - timezone: GMT/UTC timezone (so, if you are in HN then you need to compute the Expire time by server's timezone and then subtract by 7)

Test URL: https://stackexchange.com/
- Go to "Sites", choose a site of interest (e.g. Mathematics) to visit
- Observe how the site asks for cookie settings
- Open the Browser to view the Cookies being set (see these fields: Name, Value, Domain, Path, Expires, Secure)

# Security
1. Hide `cookieFunc.php` script from public access: 
   1. change owner/group to `daemon.daemon`
   2. change permission: `o-r` (no reading for public)
2. Test that 
   1. `cookieFunc.php` not viewable on VsCode
   2. BUT `cookieImproved.php` and `cookieDelImproved.php` still work on the browser

# Lecture Notes
To delete a cookie, you must set the path and domain values to be the same as those used when you set the cookie in the first place:
- `setcookie(name, value, expire, path, domain, secure)`, where `expire = time() - 3600` 