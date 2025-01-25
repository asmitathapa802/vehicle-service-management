# Vehicle Service Management

Vehicle Service Management is a web application that allows users to manage vehicle service bookings. It includes an admin module for managing parts and users, and a user module for booking services.

## Features

- User registration and login
- Admin dashboard for managing parts and users
- User dashboard for managing service bookings
- Responsive design

## Technologies Used

- PHP
- MySQL/MariaDB
- HTML/CSS
- JavaScript

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/asmitathapa802/vehicle-service-management.git
    ```

2. Navigate to the project directory:
    ```sh
    cd vehicle-service-management
    ```

3. Set up the database:
    - Create a database named `asmitadb`.
    - Import the provided SQL script to create tables and insert sample data:
        ```sh
        mysql -u root -p asmitadb < database_setup.sql
        ```

4. Configure the environment variables:
    - Create a [.env](http://_vscodecontentref_/4) file in the root directory with the following content:
        ```plaintext
        DB_SERVER=localhost
        DB_USERNAME=root
        DB_PASSWORD=
        DB_NAME=asmitadb
        ```

5. Start the web server (e.g., XAMPP, WAMP) and navigate to the project directory in your browser.

## Usage

- Access the admin module at `http://localhost/vehicle-service-management/admin/index.php`.
- Access the user module at `http://localhost/vehicle-service-management/public/index.php`.

## License

This project is licensed under the MIT License.

## Contact

For any questions or inquiries, please contact [asmitathapa802](https://github.com/asmitathapa802).