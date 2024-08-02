# URL Shortener

## Description

A simple URL shortener application built using PHP, MySQL, HTML, CSS, and JavaScript. This project allows users to create short links that redirect to longer URLs. It features a web-based interface to manage and view URLs, including functionality for adding, deleting, and updating links.

## Features

- Add new URLs with custom short links.
- View a list of all shortened URLs and their details.
- Update the status of links (active/deactive).
- Delete URLs.
- Copy shortened URLs to clipboard.

## Installation

1. **Clone the repository:**
    ```bash
   git clone https://github.com/anupam0309/url-shortener.git
   cd url-shortener
    
2. **Set Up the Environment**
    Ensure you have XAMPP installed on your local machine.
 
4. **Place the Project in the `htdocs` Directory**
    - Copy the project folder into the `htdocs` directory of your XAMPP installation.

5. **Configure the Database**
    - Open phpMyAdmin (usually at `http://localhost/phpmyadmin`).
    - Create a new database named `shortner`.
    - Import the `shortner.sql` file provided in the project to create the necessary tables.
    - You can do this by selecting the database in phpMyAdmin, then using the "Import" tab to upload the SQL file.

6. **Update Database Connection Settings**
    - Open `config.php` in the project directory.
    - Update the database connection settings with your local credentials:
    ```php
    <?php
    $con = mysqli_connect('localhost', 'your_username', 'your_password', 'shortner');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

## Usage

1. **Access the Application**

   - Open your web browser and navigate to `http://localhost/url-shortener` (replace `url-shortener` with the folder name you used).

2. **Add a New URL**

   - Click on the "New URL" link to access the form for adding a new URL. Enter the URL and a custom short link, then submit the form.

3. **View and Manage URLs**

   - Navigate to the main page to view and manage your saved URLs.
   - Use the "Copy" button next to each short link to copy the URL to your clipboard. The button text will briefly change to "Copied" to indicate the action was successful.
   - Use the "Delete" link to remove a URL from the database.
   - Toggle the status of a URL between active and deactivated using the provided status links.



