<?php 
include_once "db.php"; 
session_start();

// Check if the session variable is set before using it
if (isset($_SESSION['user_info_user_type'])) {
    if ($_SESSION['user_info_user_type'] == 'A') {
        header("location: admin/");   
        exit; // Don't forget to call exit after header redirection
    }

    if ($_SESSION['user_info_user_type'] == 'C') {
        header("location: common_user/");
        exit; // Don't forget to call exit after header redirection
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h3.display-3, h6.display-6 {
            color: #5c5c8a;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .container-fluid {
            padding-top: 20px;
            margin: auto;
            width: 95%;
        }

        .table {
            background-color: #ffffff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .table th, .table td {
            padding: 12px;
            border-bottom: 2px solid #f1f1f1;
            text-align: center;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .btn {
            border: none;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
            border-radius: 20px;
            transition: transform 0.3s ease, background-color 0.3s ease;
            cursor: pointer;
        }

        .btn-success {
            background-color: #ff85a2; /* Same as btn-primary */
        }

        .btn-success:hover {
            background-color: #ff6384; /* Same hover effect as btn-primary */
            transform: scale(1.05); /* Uniform scaling effect on hover */
        }

        .btn-primary {
            background-color: #ff85a2;
        }

        .btn-primary:hover {
            background-color: #ff6384;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #ff7272;
        }

        .btn-danger:hover {
            background-color: #fa5252;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #ffd43b;
        }

        .btn-warning:hover {
            background-color: #fcc419;
            transform: scale(1.05);
        }

        .btn-link {
            background-color: transparent;
            color: #ff85a2;
            padding-left: 0;
            transition: color 0.3s ease;
        }

        .btn-outline-success {
            background-color: transparent;
            color: #ff85a2;
            padding-left: 0;
            transition: color 0.3s ease;
        }

        .btn-link:hover {
            color: #ff6384;
            background-color: transparent;
        }

        .input-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input[type="number"], input[type="text"], input[type="email"], input[type="password"], input[type="search"], input[type="tel"], input[type="url"], input[type="file"] {
            width: auto;
            margin-right: 10px;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 8px 10px;
            transition: border-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        input[type="number"]:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="url"]:focus, input[type="file"]:focus {
            border-color: #ff85a2;
            outline: none;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        .form-control {
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .form-control:focus {
            background-color: #fff0f6;
            border-color: #ff85a2;
            outline: none;
        }

        select.form-control {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 8px 10px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: auto;
            display: inline-block;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            background-color: white;
            cursor: pointer;
        }

        select.form-control:focus {
            border-color: #ff85a2;
            outline: none;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            background-color: #fff0f6;
        }

        .item-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .item {
            border: 1px solid #ccc;
            padding: 10px;
            cursor: pointer;
            position: relative;
        }

        .item-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .item-info {
            text-align: center;
        }

        .item-details {
            background-color: #f8f8f8;
            padding: 10px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
   <div class="container-fluid">
       <?php include_once "header_index.php"; ?>

       <div class="row">
           <div class="col-4 bg-success text-light">
             <?php
               // Remove the section for adding a new item
               // Remove the PHP code for handling item deactivation and update
               ?>
           </div>
           <div class="col-8">
               <div class="item-container">
                   <?php
                   $sql_get_items = "SELECT * FROM `items` WHERE `item_status`='A' order by items_id DESC";
                   $get_result = mysqli_query($conn, $sql_get_items); 
                   while ($row = mysqli_fetch_assoc($get_result)) { ?>
                       <div class="item" onclick="showDetails(this)">
                           <img src="uploads/<?php echo htmlspecialchars($row['item_image']); ?>" alt="" class="item-image">
                           <div class="item-info">
                               <h4 class="item-name"><?php echo htmlspecialchars($row['item_name']); ?></h4>
                               <p class="item-price"><?php echo "Php " . number_format($row['item_price'], 2); ?></p>
                           </div>
                           <div class="item-details" style="display: none;">
                               <p class="item-category"><?php echo htmlspecialchars($row['item_category']); ?></p>
                               <p class="item-desc"><?php echo htmlspecialchars($row['item_desc']); ?></p>
                               <!-- Replace update and deactivate buttons with Login to Buy button -->
                               <a href="process_login.php" class="btn btn-primary">Login to Buy</a>
                           </div>
                       </div>
                   <?php } ?>
               </div>
           </div>
       </div>
   </div>
    
</body>

<script>
function showDetails(item) {
    var details = item.getElementsByClassName('item-details')[0];
    var isVisible = details.style.display === 'block';
    details.style.display = isVisible ? 'none' : 'block';
}
</script>
</html>
