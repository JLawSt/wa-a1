<!DOCTYPE html>
<html>

    <head>
        <title>Login Page</title>
    </head>

    <body>
        <h2>Sign In</h2>

        <?php
            if (isset($_GET['error'])) {
                echo '<p style="color:blue;">'.htmlspecialchars($_GET['error']).'</p>';
            }
        ?>

        <form action="auth.php" method="post">
            Username: <input type="text" name="username" required>
            Password: <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
