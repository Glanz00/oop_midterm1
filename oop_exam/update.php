<?php 
    if (!isset($_GET['id'])) {
        header('location: home.php');
        exit();
    }
    $id = $_GET['id'];
    require_once('database.php');
    
    // Get all records and find the matching one
    $all_data = $user_infos->show_all('user_informations');
    $user_data = null;
    
    foreach ($all_data as $record) {
        if ($record['user_id'] == $id) {
            $user_data = $record;
            break;
        }
    }
    
    if (!$user_data) {
        echo "<p style='color: red;'>User not found!</p>";
        exit();
    }
?>

<form action="" method="GET">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label for="username">Username:    </label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user_data['name']); ?>">
    <br>
    
    <label for="password">Password:</label>
    <input type="text" id="password" name="password" value="<?php echo htmlspecialchars($user_data['section']); ?>">

    <br>
    <button name="btn" type="submit">Update User</button>
</form>

<?php 

    //ENTER YOUR CODE HERE

    if (isset($_GET['btn'])) {
        $name = $_GET['username'];
        $section = $_GET['password'];
        $update_id = $_GET['id'];

        try {
            $user_infos->update('user_informations', $name, $section, $update_id);
            header('location: home.php');
            exit();
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Error updating user: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }

?>
