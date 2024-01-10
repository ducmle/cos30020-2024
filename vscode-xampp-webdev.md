# Set up visual studio code for web development:

URL: https://www.youtube.com/watch?v=4NfFFsQC77M

Note on extensions:
- Live Server: install
- Bootstrap: skip
- Javascript: skip

Other extensions will be installed later when needed.

# Set up XAMPP for hosting web server development

## Install XAMPP

URL: https://www.youtube.com/watch?v=-f8N4FEQWyY

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

Steps: 
- locate web server's root folder: C:\xampp\htdocs
(C:\xampp is the default installation folder, change it if you used another instalation folder in set-up)
- create a dev sub-folder: C:\xampp\htdocs\dev
- create all web development files (html, css, js, etc.) in the dev subfolder. 
- view the development server on browser:
http://localhost/dev

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

