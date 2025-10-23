<?php 

require_once('connection.php');

class Database{
    private $conn;
    
    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function show_all($dbTable)
{
    $sql = "SELECT * FROM $dbTable";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function create($dbTable, $username, $password)
    {
        $create = "INSERT INTO $dbTable (`username`, `password`) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($create);
        $stmt->execute([':username' => $username, ':password' => $password]);
    }

    public function delete($dbTable, $id)
    {
        $create = "DELETE FROM $dbTable WHERE user_id = :id";
        $stmt = $this->conn->prepare($create);
        $stmt->execute([':id' => $id]);
    }

    public function update($dbTable,  $name, $sec, $id)
    {
        $create = "UPDATE $dbTable SET name = :name, section = :section WHERE user_id = :id";
        $stmt = $this->conn->prepare($create);
        $stmt->execute([':name' => $name, ':section' => $sec, ':id' => $id]);
    }
    //CREATE YOUR CRUD FOR DATABASE HERE
}


//DECLATION OF OBJECTS
$users = new Database($conn);
$user_infos = new Database($conn);