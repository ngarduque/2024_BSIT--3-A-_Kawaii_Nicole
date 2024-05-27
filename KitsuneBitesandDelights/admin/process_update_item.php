<?php
include_once "../db.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $item_name = $_POST['f_item_name'];
    $item_desc = $_POST['f_item_desc'];
    $item_price = $_POST['f_item_price'];
    $item_image = $_FILES['f_item_image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES['f_item_image']['name']);

    // Move the uploaded file to the 'uploads' directory
    if (move_uploaded_file($_FILES['f_item_image']['tmp_name'], $target_file)) {
        // Prepare the SQL statement
        $sql = "UPDATE items SET item_name=?, item_desc=?, item_price=?, item_image=? WHERE items_id=?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssdsi", $item_name, $item_desc, $item_price, $item_image, $_GET['update_item']);
        
        // Execute the statement
        if(mysqli_stmt_execute($stmt)) {
            header('Location: index.php?update_status=1');
            exit; // Add an exit statement after header redirection to stop script execution
        } else {
            header('Location: index.php?update_status=0');
            exit; // Add an exit statement after header redirection to stop script execution
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
