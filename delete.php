<?php
include './config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['delete_user'])) {
        $userId = $_GET['id']; 
        
        $sql = "DELETE FROM crudAppDev WHERE id = :userId";  
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo '<script>alert("Deleted Successfully!");';
            echo 'window.location.href = "./index.php";</script>';
            exit();
        } else {
            echo "Something went wrong inner";
        }
    } else {
        echo "Something went wrong";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
    <!-- Your HTML content here -->
</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
