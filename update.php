<?php

include './config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['update_user'])) {
        $userId = $_GET['userId'];
        $name = isset($_GET['matName']) ? $_GET['matName'] : '';
        $description = isset($_GET['matDescription']) ? $_GET['matDescription'] : '';
        $quantity = isset($_GET['matQuantity']) ? $_GET['matQuantity'] : '';
        $barcode = isset($_GET['matBarcode']) ? $_GET['matBarcode'] : '';
        $price = isset($_GET['matPrice']) ? $_GET['matPrice'] : '';
        if ($userId && $name && $description && $quantity && $barcode && $price) {
            $sql = "UPDATE crudAppDev SET Name = :name, Description = :description, Quantity = :quantity, Barcode = :barcode, Price = :price WHERE Id = :userId";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':barcode', $barcode, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<script>alert("Updated Successfully!");';
                echo 'window.location.href = "./index.php";</script>';
                exit();
            } else {
                echo "Something went wrong";
            }
        } else {
            echo "Missing required data";
        }
    } else {
        echo "Something went wrong";
    }
}

?>
