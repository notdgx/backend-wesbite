ONLINE REGISTRATION SYSTEM — SIMPLE PHP + MYSQL

This is a simplified version of the original Registration project, styled using the supplied CSS theme.

HOW TO RUN IN XAMPP
1. Extract this folder into C:\xampp\htdocs\Registration
2. Open XAMPP Control Panel and start Apache and MySQL.
3. Open http://localhost/Registration/index.php
4. The first PHP page checks if the database named "college_db" exists.
   - If it exists, it connects to it.
   - If it does not exist, it creates it.
   - It also creates the "user" table if the table is missing.
5. Click "Register here" to add a user, then log in.

DATABASE
The database is called college_db. The table is called user. The database is created automatically in connect.php, so phpMyAdmin setup is not required.
If your MySQL username/password differs from the default XAMPP settings, edit the first line of mysqli_connect() in connect.php.

FILES
- connect.php: connects to MySQL, checks/creates the database and table.
- register.html: new user form.
- register.php: saves the new user details.
- index.php: login page.
- home.php: lists the registered users and provides Edit/Delete links.
- edit.php: displays the selected user's existing details.
- update.php: saves edited details.
- delete.php: removes the selected user and their image.
- logout.php: logs out.
- stylesheet.css: styling inspired by the supplied style.css.

NOTES
- This keeps the original project's simple plain-text password style for compatibility with its existing database. Do not use this version for a public/real website; passwords should be hashed for real applications.
- The Admin/User choice is just a stored role label; it does not create separate permissions.
