<?php
session_start(); // Sess data.

// Get form data.
$username = $_POST["username"];
$password = $_POST["password"];

// DB connect settings.
$servername = "localhost";
$dbusername = "root";
$dbpassword = ""; 
$dbname = "webapp";
$socket = "/Users/jl/acad/wp_a1/a1/mysql-run/mysqld.sock";

// Conection.
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname, null, $socket);

// Check conn.
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

// Prepare statement.
$stmt = $conn->prepare("SELECT firstname, lastname, email, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Check if user exists.
if ($stmt->num_rows > 0) {
    $stmt->bind_result($firstname, $lastname, $email, $hashed_password);
    $stmt->fetch();

    // Verf pw.
    if (password_verify($password, $hashed_password)) {
        // Store user info in session.
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        header("Location: welcome.php");
        exit();
    } 
        
     else {
        // Wrong pw.
        header("Location: login.php?error=Invalid username or password");
        exit();
    }
} 

else {
    // User non-existent.
    header("Location: login.php?error=Invalid username or password");
    exit();
}

// Close statement and connection.
$stmt->close();
$conn->close();
