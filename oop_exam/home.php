<?php 
    require_once('connection.php');
    require_once('database.php') ;

    $users = new Database($conn);
    $user_infos = new Database($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php 
        $data = $user_infos->show_all('user_informations');
    ?>
    <table border="1">
    <tr>
        <th>Name</th>
        <th>Section</th>
        <th>Action</th>
    </tr>

    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['section']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['user_id']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['user_id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>