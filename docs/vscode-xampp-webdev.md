# VSCode extensions
## PHP-related Extensions
### PHP Extension Pack
Includes: PHP IntelliSense, PHP Debug
- Advanced Autocompletion and Refactoring support for PHP

### PHP Intelephense
- Format PHP
- HTML auto-completion in PHP file and other features
- Format HTML in PHP

### Format HTML in PHP
Provides formatting for the HTML code in PHP files using JSbeautify - Works well paired with a PHP formatting extension

### Document formatting command: 
Ctrl + Shift + I or Shift + Alt + F

## HTM/LCSS/JavaScript
### Prettier (HTML, CSS, Javascript, JSON, Markdown, XML, ...)
- Code formatter using prettier 

# Set up XAMPP for hosting web server development

## Install XAMPP

URL: [https://youtu.be/-f8N4FEQWyY](https://youtu.be/-f8N4FEQWyY)

Select components:
- Apache
- MySQL
- PHP
- phpMyAdmin

### For Linux systems

- Make the xampp download executable:

```
chmod u+x xampp*
```

- Then install: 

```
sudo /home/Downloads/xampp...
```

- Default installation directory: `/opt/lampp`

- Need root permission to edit this directory:
e.g. to create the `dev` folder:

```
cd /opt/lampp

sudo mkdir dev
```

# Configure web server to host the development folder

Suppose your XAMPP is installed at the folder `$XAMPP = C:/xampp`:

1. Add `$XAMPP/php` to your system's path. This is needed for VSCode to execute `php.exe` from VSCode and on the terminal.
2. Open the Command prompt at the `$XAMPP` installation folder
3. Create a symbol link from your code folder to a subfolder under the folder `$SAMPP/htdocs`. Follow the [instructions here](https://www.howtogeek.com/16226/complete-guide-to-symbolic-links-symlinks-on-windows-or-linux/) on how to create symbolic link on Windows or Linux. 
   
   Suppose your code folder name is `C:/COS10026/dev`. After this step, you get the link `$XAMPP/htdocs/cos10026` that points to that folder
4. View your dev directory by pointing your browser to: `http://localhost/cos10026`
5. Browse and execute your desired PHP script

# Working with your dev folder on VSCode
- Start VSCode
- Select: File/Open folder
  Browse to select the dev folder that you set up previously
- Create subfolders and files in your dev folder: use the buttons next to each folder name (visible when you hover the mouse over it).
- Organise your resources by each weekly tasks.
Example: 
  - for week 1: create a subfolder w01. 
  - for week 1's tasks 1: create a subfolder w01/t1 for all resources pertaining to this task
  - and so on

# (Optional) Creating a VSCode workspace for your dev folder
Helps easily organise different code projects.

- Start VSCode
- Select: File/Open folder
  Browse to select the dev folder that you set up previously
- Select: File/Save workspace as
  Name it: dev.code-workspace
- That's it! Start creating subfolders and files in your dev folder using this workspace. Organise your files by weeks and tasks.
Example: 
  - create folder w01 for week 1. 
  - then create a subfolder w01/t1 for all resources pertaining to week1's task 1, and so on for other tasks

- You can close one workspace and open another easily by using "File/Open workspace" and browse to select your desired workspace file.

