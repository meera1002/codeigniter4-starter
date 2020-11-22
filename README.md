# CodeIgniter 4 Application Starter

## Specifications

- PHP 7.2 or greater
- CodeIgniter 4
- Bootstrap

## Developer Notes

Please follow these instructions to set up your development environment:

- Rename env to .env
- Run "composer update"
- Create a database name called web_db
- Set db user name & password in .env ( database.default.username & database.default.password )
- Import web_db.sql from the cloned repo. It contains the admin user info as well
- Run "php spark serve" in your cloned repo
- This will open a development server http://localhost:8080/ and open this url in your browser
- Admin login email & password => test@example.com | 123456789
- Upon the successful registration of the user, I am writing email content to the log file. You can find email HTML data from there [writable/logs]. The email will contain the verification email link. 
