<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <br>
    <form action="" method="GET">
        <label for="username">Username:    </label>
        <input type="text" id="username" name="username">
        <br>
        
        <label for="password">Password: </label>
        <input type="text" id="password" name="password">

        <br>
        <button type="submit">Login</button>
        <br>
        <small>Dont have an account? Click <a href="index.php"> here </a></small>
    </form>
</body>
</html>

<?php
    session_start();
    
    // If user is already logged in, redirect to home
    if (isset($_SESSION['user_id'])) {
        header('location: home.php');
        exit();
    }

    require_once('connection.php');
    require_once('database.php');

    if (isset($_GET['username']) && isset($_GET['password'])) 
    {
        $username = $_GET['username'];
        $password = $_GET['password'];

        // Get user data
        $all = $users->show_all('users');
        
        // Check each user for matching credentials
        foreach ($all as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('location: home.php');
                exit();
            }
        }
                     echo $username.$password;
        
        // Invalid credentials
        echo "<p style='color: red;'>Invalid username or password</p>";
    }



?>