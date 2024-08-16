# What is Email Processor

Email Processor is an Engineering Assessment for Inflektion on how to process raw email content to printable characters.

## Installation

-  Extract the zip file in your folder
-  Open it to your favorite Code Editor (e.g. vscode, vim)
-  Run "composer install" in the terminal while in the directory
-  Add your database values in .env (mysql)
-  Run "php artisan migrate:refresh --seed" (for migration and fake data values)
-  Run "php artisan serve"
-  We need "Postman" app to check the API endpoints

## Notes

**User Login for Authentication:**

-  email: test@example.com
-  password: password

## API Endpoints

**Hourly Email Content Parser**
- (GET) http://localhost:8000/api/email-updates

**Authenticate**
- (POST) http://localhost:8000/api/login
- add email and password in Body->form-data (Postman)
- copy Token in Authorization Bearer Token for every Authenticated calls (Postman)

**Store**
- (POST) http://localhost:8000/api/email (added with parsed raw_text from email)
- add all the values in Body->form-data (Postman)

**Get by ID**
- (GET) http://localhost:8000/api/email/{$id} (soft deleted data cannot be fetched)

**Update**
- (PUT) http://localhost:8000/api/email/{$id}
- add all the values in Body->form-data (Postman)

**Get All**
- (GET) http://localhost:8000/api/email (soft deleted cannot be fetch, paginated also to 5)

**Delete by ID**
- (DELETE) http://localhost:8000/api/email/{$id} (only soft deletes)

**Logout**
- (POST) http://localhost:8000/api/logout (Removes Token)