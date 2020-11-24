# CodeIgniter 4 Application Starter

# Task: Create a web application. 
- Create a User with the Admin Role. 
- The Admin can view the list of Users and could edit and delete their content. 
Registration for frontend users. 
The User details are, 
- First name 
- Last name 
- Phone number ( Enter only UK numbers) 
- Date of birth 
- Email 
- Password 
- Country (default UK) 
- Subscription For (either of type: story, comment, poll) 
Once the user is registered, 
- send out a welcome email to verify their email address. 
- pull the top 10 objects of type for which the user has subscribed, from the api https://hn.algolia.com/api and save in db against the user. 
- Verified Users need to see a list of contents to which they have subscribed for. - Verified Users would also be able to see the detail of the Content. (Eg: author, story_text ) 


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
