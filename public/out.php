<?php
session_start(); // Access session data.

session_destroy(); // Remove session data in order to facilitate logout.

header("Location: login.php"); // Return user to login page.
?>
