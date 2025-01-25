# Vehicle Service Management

Vehicle Service Management is a web application for managing vehicle service bookings, parts, and users.

## Features

- User registration and authentication
- Admin management
- Service booking management
- Parts management

## Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL
- Composer

### Installation

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