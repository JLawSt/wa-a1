<?php
session_start(); // Get sess data.
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Welcome Page</title>
    </head>

    <body>
        <h2>Greetings</h2>

        <p>First Name: <?php echo htmlspecialchars($_SESSION['firstname']); ?></p>
        <p>Last Name: <?php echo htmlspecialchars($_SESSION['lastname']); ?></p>
        <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>

        <form action="out.php" method="post">
            <input type="submit" value="Logout">
        </form>
    </body>
</html>
