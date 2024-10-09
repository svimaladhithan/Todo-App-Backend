# Techno-Functional Document: TODO App Backend

## Backend Development Approach:
- Analysed and learned the architecture and flows of **Laravel**
- Completed setting up the development environment with **Laravel**, **PHP**, and **Composer** for creating RESTful APIs to handle requests and responses.
- Completed setting up **MySQL** database for fetching, creating, editing and deleting the TODOs.
- Generated the **Application key** for secure access.

## To run the program locally, please follow the commands after cloning the repository:
- Install Dependencies: Make sure you have Composer installed. Then run:
  ### composer install
- In the .env file, you’ll need to update the database settings. For example:
  ### DB_CONNECTION=mysql
  ### DB_HOST=127.0.0.1
  ### DB_PORT=3306
  ### DB_DATABASE=your_database_name  # Replace with your actual database name
  ### DB_USERNAME=your_username        # Replace with your database username
  ### DB_PASSWORD=your_password        # Replace with your database password
- Generate Application Key: Run the following command:
  ### php artisan key:generate
- run: **php artisan migrate**
- Start the server: **php artisan serve**
 ### Access the application at http://localhost:8000.

### Postman Documentation:
[Postman Documentation](https://documenter.getpostman.com/view/34987093/2sAXxQcWkU)

### Technologies Used:
- **Backend Language**: PHP
- **Backend Framework**: Laravel
- **Database**: MySql
- **Other Technologies**: Composer, Postman for API documentation

### API Endpoints:
- **POST /api/todos**: Create a Todo
- **GET /api/todos**: Fetch all Todos
- **PUT /api/todos/:id**: Update a Todo by ID
- **DELETE /api/todos/:id**: Delete a Todo by ID
