# SCRYPTN - Online Compiler and Assignment Submission System

SCRYPTN is an online compiler and assignment submission system designed to streamline the process of code compilation and assignment submission. It leverages the power of Judge0 as the backend compiler, and utilizes PHP and MySQL for other functionalities. With SCRYPTN, users can interact with three panels: student, teacher, and admin. Currently, it supports five programming languages: C, C++, Java, Python, and PHP.

## Features

- **Online Compiler**: SCRYPTN provides an online compiler powered by Judge0, allowing users to compile and run their code in real-time.
- **Assignment Submission**: Students can easily submit their assignments through the system, providing a convenient and centralized submission process.
- **Multiple Language Support**: SCRYPTN currently supports five programming languages: C, C++, Java, Python, and PHP, allowing users to write and compile code in their preferred language.
- **Student Panel**: Students can access the system through the student panel, where they can submit assignments, view their submission history, and receive feedback from teachers.
- **Teacher Panel**: Teachers can manage assignments, review and grade student submissions, and provide feedback through the teacher panel.
- **Admin Panel**: The admin panel offers administrative functionalities, allowing administrators to manage users, assignments, and system settings.
- **User Authentication**: SCRYPTN implements a secure user authentication system to protect user data and ensure privacy.
- **Database Management**: The system uses PHP and MySQL for database management, storing user information, assignments, and submission history.
- **Customizable**: SCRYPTN is highly customizable, allowing administrators to configure various settings, such as supported languages and compiler options, to meet the specific needs of their institution.

## Getting Started

To get started with SCRYPTN, follow the instructions below:

### Prerequisites

- PHP (>= 7.0)
- MySQL (>= 5.7)
- A self-hosted [Judge0](https://judge0.com) instance

### Installation

1. Clone the SCRYPTN repository to your local machine:

   ```
   git clone https://github.com/anujbarve/Scryptn.git
   ```

2. Create a MySQL database named `scr`.

3. Import `scr.sql` into that database to set up the tables.

4. Set your MySQL credentials in `inc/db.php`.

5. Point `inc/compiler.php` at your Judge0 instance. It expects `http://172.17.0.1:2358` by default.

6. Serve the project from a PHP web server and open it in your browser.

## Contributing

Contributions to SCRYPTN are always welcome! If you'd like to contribute, please follow these steps:

1. Fork the repository.

2. Create a new branch:

   ```
   git checkout -b my-new-feature
   ```

3. Make your changes and commit them:

   ```
   git commit -am 'Add some feature'
   ```

4. Push the branch:

   ```
   git push origin my-new-feature
   ```

5. Submit a pull request detailing your changes.

## License



SCRYPTN is released under the MIT License.

## Acknowledgements

- [Judge0](https://judge0.com): An open-source autograder and online code editor.
- [PHP](https://www.php.net): A popular server-side scripting language.
- [MySQL](https://www.mysql.com): An open-source relational database management system.

## Contact

For questions or feedback, please open an issue on this repository.
