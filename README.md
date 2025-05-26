# Dental Flow (Dental Clinic Appointment System) Laravel-Project

## Feature List:
### 1. Authentication
- Log In
- Register
- Log Out

### 2. Admin Page
#### 2.1 Roles Page
- Get Roles
- Add Role
- Edit Role
- Delete Role

#### 2.2 User Page
- Get Users
- Add User
- Edit User
- Delete User

#### 2.3 User Status
- Get User Statuses
- Add User Status
- Edit User Status
- Delete User Status

#### 2.4 Patient Information Page
- Get Patient Informations
- Add Patient Information
- Edit Patient Information
- Archive Patient Information

#### 2.5 Doctor Information Page
- Get Doctor Informations
- Add Doctor Information
- Edit Doctor Information
- Archive Doctor Information

#### 2.6 Dental Service Page
- Get Dental Services
- Add Dental Service
- Edit Dental Service
- Delete Dental Service

#### 2.7 Appointment Page
- Get Appointments
- Add Appointment
- Edit Appointment
- Delete Appointment

#### 2.8 Appointment Status Page
- Get Appointment Statuses
- Add Appointment Status
- Edit Appointment Status
- Delete Appointment Status

#### 2.9 Appointment Services Page
- Get Appointment Services
- Add Appointment Service
- Edit Appointment Service
- Delete Appointment Service

#### 2.10 Treatment Status Page
- Get Treatment Statuses
- Add Treatment Status
- Edit Treatment Status
- Delete Treatment Status

#### 2.11 Payment Page
- Get Payments
- Add Payment
- Edit Payment
- Delete Payment

#### 2.12 Payment Status
- Get Payment Statuses
- Add Payment Status
- Edit Payment Status
- Delete Payment Status


## Prerequisites

Before setting up the project, ensure you have the following installed:

- [XAMPP](https://www.apachefriends.org/download.html) (includes PHP, MySQL, and Apache)
- [Visual Studio Code](https://code.visualstudio.com/download) (recommended code editor)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/) (>= 14.x)
- [Git](https://git-scm.com/downloads)

## Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/rodelizalarosa/DentalAppointmentSystem_LARAVEL.git
   cd PMS
   ```

2. Open terminal and install PHP dependencies:
   ```
   composer install
   ```

3. Create a copy of the `.env.example` file and rename it to `.env`:
   ```
   cp .env.example .env
   ```

4. Generate an application key:
   ```
   php artisan key:generate
   ```

5. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=dcas
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Run database migrations:
   ```
   php artisan migrate
   ```

7. Start the development server:
    ```
    php artisan serve
    ```

8. Visit `http://localhost:8000` in your browser to see the application.

## Running the Application

1. Start the Laravel development server:
   ```
   php artisan serve
   ```

2. Access the application at `http://localhost:8000`

## Additional Configuration

- To configure other services or features, refer to the Laravel documentation: [https://laravel.com/docs](https://laravel.com/docs)

## Troubleshooting

If you encounter any issues during setup or running the application, please check the Laravel and Vue.js documentation or open an issue in this repository.

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

