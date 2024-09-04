<?php 
      include './config/connection.php';

       $sql = "DELETE FROM mcb_users";

       $queried = mysqli_query($connection, $sql);

       if ($queried) {
        echo "Deleted Successfully!";
       }
       else {
        echo "Something went wrong";
       }
       header("Location: ./index.php");
?>