<?php 
    require_once('database.php');    
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <button type="submit">Create Account</button>
        <br>
        <small>Already have account? Click <a href="login.php"> here </a></small>
    </form>
</body>
</html>



<?php 
    //ENTER YOUR CODE HERE   
    if (isset($_GET['username']) && isset($_GET['password'])) 
    {
        $username = trim($_GET['username']);
        $password = $_GET['password'];

        
        if (empty($username) || empty($password)) {
            echo "<p style='color: red;'>Username and password are required</p>";
            exit();
        }

        try {
            $users->create('users', $username, $password);
            header('location: login.php');
            exit();
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Error creating account. Please try again.</p>";
        }
    } 
?>