<?php
include "../db.php";
session_start();
$s_user_id = $_SESSION['user_info_id'];
if($_SESSION['user_info_user_type'] != 'C'){
    header("location: ../index.php");
}
if(isset($_GET['logout'])){
    session_destroy();
    header("location: ../index.php"); //go back to landing page of visitors page.
    die();
}

if(isset($_GET['delete_from_cart'])){
    $order_id = $_GET['delete_from_cart'];
    $sql_delete_from_cart = "DELETE FROM orders WHERE orders_id = '$order_id' and order_phase = '1' ";
    $sql_execute = mysqli_query($conn, $sql_delete_from_cart);
    if($sql_execute){
        header("location: index.php?page=home&msg=cart item removed.");
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<style>
    /* Overall body styling */
/* Overall body styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    padding-top: 20px;
}

/* Styling for the main container */
.container-fluid {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

/* Header styles */
.display-3 {
    color: #5c5c8a;
    font-size: 24px;
    font-weight: bold;
}

.display-6 {
    color: #5c5c8a;
    font-size: 18px;
    font-weight: bold;
}

/* Table styling */
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

/* Button styles */
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

.btn-primary, .btn-danger, .btn-warning {
    /* Applying new color schemes */
    transition: background-color 0.3s ease, transform 0.3s ease;
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

.btn-link:hover {
    color: #ff6384;
    background-color: transparent;
}

/* Input styles */
.input-group {
    margin-top: 10px;
    margin-bottom: 10px;
}

input[type="number"], input[type="text"], input[type="submit"] {
    border: 2px solid #ddd;
    border-radius: 10px;
    padding: 8px;
    transition: border-color 0.3s ease;
}

input[type="number"]:focus, input[type="text"]:focus, input[type="submit"]:focus {
    border-color: #ff85a2;
    outline: none;
}

.btn.btn-link.logout {
    background-color: #ff85a2;      /* Pink background color */
    color: white;                   /* White text for contrast */
    padding: 8px 16px;              /* Padding for a button-like shape */
    border: none;                   /* No border for a clean, modern look */
    border-radius: 20px;            /* Rounded corners for a soft, friendly appearance */
    cursor: pointer;                /* Cursor like a button */
    font-size: 16px;                /* Font size to match other buttons */
    font-family: inherit;           /* Inherits the font from the parent or defaults */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions for interactive effects */
    text-decoration: none;          /* No underline, to differentiate from links */
}

.btn.btn-link.logout:hover, .btn.btn-link.logout:focus {
    background-color: #ff6384;      /* Lighter pink on hover for visual feedback */
    transform: scale(1.05);         /* Slight enlargement on hover/focus for tactile feedback */
    color: white;                   /* Maintain text color for readability */
    outline: none;                  /* Removes the outline to keep a clean look on focus */
}

/* Miscellaneous */
hr {
    border-top: 1px solid #eee;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-3, .display-6 {
        font-size: 16px;
    }

    .btn, input[type="number"], input[type="submit"] {
        width: 100%;
        margin-top: 5px;
    }

    .input-group {
        flex-direction: column;
    }
}

.item-container {
    display: flex;         /* Enables flexbox layout */
    flex-wrap: wrap;       /* Allows items to wrap onto the next line */
    gap: 20px;             /* Space between items */
    justify-content: flex-start;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    padding: 20px; /* Align items to the start of the container */
}

.item {
    flex: 1 1 200px;       /* Each item can grow and shrink but base at 200px */
    box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Optional: Adds shadow for better visibility */
    margin-bottom: 20px;   /* Space at the bottom of each item */
    border-radius: 8px;    /* Optional: Rounds corners of the item boxes */
    overflow: hidden;      /* Ensures no content spills out */
    background: white;     /* Background color for the item */
}

.item-info {
    padding: 15px; /* Adds padding inside the item box */
    text-align: center; /* Centers the text inside the item-info div */
}

.item-name, .item-desc, .item-price {
    margin: 10px 0; /* Adds vertical spacing between elements */
}

.item-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.img-fluid {
    width: 40px;
    height: 40px;
    object-fit: cover;
}


</style>

<body>
    
    <div class="container-fluid">
       <div class="row">
           <div class="col-12">
                 <h3 class="display-3">
                    Welcome <?php echo $_SESSION['user_info_fullname']; ?>
                    
                </h3>
                <button type="button" class="btn btn-link logout" onclick="location.href='?logout'">Logout</button>
                <button type="button" class="btn btn-link logout" onclick="location.href='?page=home'">Home</button>
                <button type="button" class="btn btn-link logout" onclick="location.href='?page=myorder'">My Orders</button>
               
           </div>
       </div>
    <?php if(isset($_GET['page'])){
                if($_GET['page'] == 'home'){ ?>

                        <div class="row"> 
                            <div class="col-9">

                            <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                
                
                <hr>
                
                <div class="col-8">
                    <div class="item-container">
                        <?php
                        $sql_get_items = "SELECT * FROM `items` WHERE `item_status`='A' ORDER BY items_id DESC";
                        $get_result = mysqli_query($conn, $sql_get_items);
                        while ($row = mysqli_fetch_assoc($get_result)) { ?>
                            <div class="item">
                                <img src="../uploads/<?php echo htmlspecialchars($row['item_image']); ?>" alt="" class="item-image">
                                <div class="item-info">
                                    <h4 class="item-name"><?php echo htmlspecialchars($row['item_name']); ?></h4>
                                    <p class="item-desc"><?php echo htmlspecialchars($row['item_desc']); ?></p>
                                    <p class="item-price"><?php echo "Php " . number_format($row['item_price'], 2); ?></p>
                                    <form action="process_add_to_cart.php" method="get" class="form-inline">
                                        <input type="hidden" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control mb-2 mr-sm-2" name="cart_qty" placeholder="Quantity" required>
                                        <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
        </div>
    </div>

                            <div class="col-3">
                <!--              Cart-->
                               <?php
                                if(isset($_GET['checkout'])){ ?>

                                    <div class="card p-1">
                                        <h3 class="card-title">Checkout Summary</h3>

                                        <div class="card-body">
                                            <?php
                                    //generate order reference number
                                                $order_number=gen_order_ref_number(8);

                                                $sql_checkout="SELECT i.item_name
                                                                , i.item_price
                                                                , i.item_desc
                                                                , i.item_img
                                                                , o.item_qty
                                                                , o.date_added
                                                                , o.orders_id
                                                             FROM `orders` as o
                                                             JOIN `items` as i
                                                               ON (o.item_id = i.items_id)
                                                            WHERE o.user_id='$s_user_id' 
                                                              AND o.order_phase='1'";
                                            $result_chkout = mysqli_query($conn,$sql_checkout);
                                            ?>
                                            <div class="alert alert-light">
                                                Order Reference Number: <?php echo $order_number; ?>
                                                <br>
                                                Receiver: <?php echo  $_SESSION['user_info_fullname'] ; ?>
                                                <br>
                                                Address: <?php echo $_SESSION['user_info_address']; ?>
                                            </div>

                                            <ul class="list-group">
                                                <?php
                                            //initialize total amount
                                            $total_amt = 0.00;
                                    
                                                while ($co = mysqli_fetch_assoc($result_chkout)){
                                                //adds up every loop of the result.
                                                $total_amt = $total_amt + ($co['item_price'] * $co['item_qty']);
                                                ?>

                                                    <li class="list-group-item"><?php echo $co['item_name'] . " - Php " . number_format($co['item_price'],2) . " x " . $co['item_qty'] . " pcs";?></li>
                                                <?php 
                                                }
                                                ?>
                                                <li class="list-group-item">
                                                   <b> Total Amount to Pay: <?php echo "Php " . number_format($total_amt,2);?> </b>
                                                </li>
                                            </ul>

                                            <form action="process_place_order.php" method="post">
                                                <div class="mt-3">

                                                   <input type="text" hidden name="f_total_amt_to_pay" value="<?php echo $total_amt; ?>">
                                                    <label for="">Alternate Receiver Name:</label>
                                                        <input type="text" class="form-control mb-3" placeholder="This is Optional" name="f_alt_receiver">
                                                    <label for="">Ship to this Address:</label>
                                                        <input type="text" class="form-control mb-3" placeholder="This is Optional" name="f_alt_address">
                                                    <label for="" class="form-label">Payment Method:</label> 
                                                    <select name="f_payment_method" id="" class="form-select mb-3">
                                                        <?php  
                                                        $sql_get_payment_method = "SELECT * FROM `payment_method`";
                                                        $payment_method_result = mysqli_query($conn, $sql_get_payment_method);

                                                        while($pm = mysqli_fetch_assoc($payment_method_result)){ ?>
                                                            <option value="<?php echo $pm['payment_method_id'];?>"><?php echo $pm['payment_method_desc'];?></option>
                                                        <?php }
                                                        ?>

                                                    </select>
                                                    
                                                    <label for="">Shipping Options:</label>
                                                        <select name="f_ship_option" class="form-select mb-2" id="">
                                                                                           <?php  
                                                        $sql_get_shipping_method = "SELECT * FROM `shippers`";
                                                        $shipping_method_result = mysqli_query($conn, $sql_get_shipping_method);;

                                                        while($pm = mysqli_fetch_assoc($shipping_method_result)){ ?>
                                                            <option value="<?php echo $pm['shipper_id'];?>"><?php echo $pm['shipping_company'];?></option>
                                                        <?php }
                                                        ?>
                                                        </select>
                                                    
                                                    <input readonly hidden type="text" name="f_order_ref_number" value="<?php echo $order_number; ?>">

                                                    <input type="submit" value="Place Order" class="btn btn-warning">
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                <?php } ?>

                               <?php
                                if(isset($_GET['msg'])){
                                     $msg = $_GET['msg']; 
                                     $status = "";
                                        if($msg == 1){
                                            $status = "Order Placed Successfully.";
                                            ?>
                                            <div class="alert alert-success">
                                                <?php echo $status;?>
                                            </div>
                                <?php   }  
                                        else{
                                            $status = $_GET['msg'];
                                            ?>
                                            <div class="alert alert-danger">
                                                 <?php echo $status;?>
                                            </div>
                                            <?php
                                        }

                                }
                                ?>
                                 <h6 class="display-6">Cart</h6>
                                                                    
                                    <?php
                                        $sql_get_cart_items = "SELECT i.item_name
                                                                    , i.item_price
                                                                    , i.item_desc
                                                                    , i.item_image
                                                                    , o.item_qty
                                                                    , o.date_added
                                                                    , o.orders_id
                                                                FROM `orders` as o
                                                                JOIN `items` as i
                                                                ON (o.item_id = i.items_id)
                                                                WHERE o.user_id='$s_user_id' 
                                                                AND o.order_phase='1' ";

                                        $cart_results = mysqli_query($conn, $sql_get_cart_items);
                                        echo "<table class='table'>";
                                        while($cart = mysqli_fetch_assoc($cart_results)){ ?>
                                            <tr>
                                                <td> <img src="../uploads/<?php echo htmlspecialchars($cart['item_image']); ?>" width="40px" alt="" class="img-fluid "></td>
                                                <td> <?php echo htmlspecialchars($cart['item_name']);?> </td>
                                                <td> <?php echo htmlspecialchars($cart['item_qty']) . " pcs";?> </td>
                                                <td> <?php echo "Php " . number_format($cart['item_price'] * $cart['item_qty'],2); ?> </td>
                                                <td> <a href="?delete_from_cart=<?php echo $cart['orders_id'];?>" class="btn btn-danger btn-sm">x</a> </td>
                                            </tr>
                                        <?php }
                                        echo "</table>";
                                    ?>
                                    <hr>
                                    <a href="?page=home&checkout" class="btn btn-warning">Checkout</a>


                            </div>
                        </div>
                <?php }
                else if($_GET['page'] == 'myorder'){ ?>
                    <div class="row">
                    
                    <?php
                        $sql_get_user_order = "SELECT DISTINCT 
                                                  o.order_ref_number
                                                , pm.payment_method_desc
                                                , o.payment_method
                                                , op.order_phase_desc
                                                , o.order_phase
                                                , o.alternate_receiver
                                                , o.alternate_address
                                                , o.gcash_ref_num
                                                , o.gcash_account_name
                                                , o.gcash_account_number
                                                , o.gcash_amount_sent
                                             FROM `orders` as o
                                             JOIN `payment_method` as pm
                                               ON o.payment_method = pm.payment_method_id
                                             JOIN `order_phase` as op
                                               ON o.order_phase = op.order_phase_id
                                            WHERE o.user_id = '$s_user_id' ";      
                    $result_orders = mysqli_query($conn, $sql_get_user_order);
                    
                    
                    while($rec = mysqli_fetch_assoc($result_orders)){ //first loop with only the order_reference_number ?>
                     <div class="col-3">
                         <div class="card mt-3">
                             <h6 class="card-title mt-1 ms-1"><?php 
                                                        echo $rec['order_ref_number'];
                                                        $curr_order_ref_number = $rec['order_ref_number'];
                                                    ?>
                                                    <div class="float-end">
                                                    <span class="badge rounded-pill text-bg-success"><?php echo $rec['payment_method_desc'];?></span>
                                                    <span class="badge rounded-pill 
                                                        <?php 
                                                                 switch($rec['order_phase']){
                                                                     case 0: echo "text-bg-danger";
                                                                         break;
                                                                     case 2: echo "text-bg-primary";
                                                                         break;
                                                                     case 3: echo "text-bg-info";
                                                                         break;
                                                                     case 4: echo "text-bg-warning";
                                                                         break;
                                                                     case 5: echo "text-bg-success";
                                                                         break;
                                                                     default: echo "text-bg-secondary";
                                                                 }
                                                                 ?> "><?php echo $rec['order_phase_desc'];?></span>
                                                   <?php if($rec['order_phase'] == '2') { ?>
                                                     <a href="process_cancel_order.php?cancel_order=<?php echo $rec['order_ref_number']; ?>" class="btn btn-danger btn-sm me-1"> x </a>
                                                   <?php } ?>
                                                    </div>
                                                    
                            </h6>
                            <?php
                             if($rec['payment_method'] == 1){  ?>
                                 <div class="card-caption p-2">
                                     <small class="small">Gcash Reference Number: <?php echo $rec['gcash_ref_num'];?></small> <br>
                                     <small class="small">Gcash Account Name: <?php echo $rec['gcash_account_name'];?></small> <br>
                                     <small class="small">Gcash Account Number: <?php echo $rec['gcash_account_number'];?></small> <br>
                                     <small class="small">Gcash Amount Sent: <?php echo $rec['gcash_amount_sent'];?></small>
                                 </div>
                             <?php }
                             ?>
                                        <?php
                                               $sql_get_user_item_order = "SELECT 
                                                                           i.item_name
                                                                         , i.item_image
                                                                         , i.item_price
                                                                         , o.item_qty
                                                                      FROM `orders` as o
                                                                      JOIN `items` as i
                                                                        ON o.item_id = i.items_id
                                                                     WHERE o.user_id = '$s_user_id' 
                                                                         AND o.order_ref_number = '$curr_order_ref_number'";
                                              $result_item_orders=mysqli_query($conn, $sql_get_user_item_order); ?>
                                                <div class="list-group">
                                               <?php $total_amt = 0.00;
                                                    while($io = mysqli_fetch_assoc($result_item_orders)){ 
                                                    $total_amt = $total_amt + ($io['item_qty'] * $io['item_price']);
                                                    ?>
                                                   <li class="list-group-item">
                                                            <img src="../uploads/<?php echo $io['item_image'];?>" width="40px" alt="" class="img-fluid">
                                                               <?php echo $io['item_name'] . " x ";?>
                                                               <?php echo $io['item_qty'] . " pcs <br>";?>
                                                            <small class="small float-end"> <?php echo "Php " . number_format($io['item_price'],2);?></small>
                                                  </li>
                                               <?php } ?>
                                               
                                               
                                                </div>
                                                <div class="card-footer">
                                                    <span class="float-end"> Total Amount: <b> <?php echo "Php " . number_format($total_amt,2); ?> </b> </span> 
                                                </div>
                                               
                                                    <?php if($rec['alternate_receiver'] != NULL){ ?>
                                                         <div class="card-footer">
                                                               <small class="small">
                                                                <?php echo "Alternate Receiver: " . $rec['alternate_receiver'] . "<br>"; ?>
                                                                <?php echo "Alternate Address: " . $rec['alternate_address'] . "<br>"; ?>
                                                                </small>
                                                        </div>
                                                    <?php } ?>
                                         
                             
                         </div>
                     </div>
                    <?php }
                    ?>
<!--                    load the My Order Page-->
                    </div>
                <?php }
    }
  
    ?>
      
    </div>
    
</body>
   <script src="../js/bootstrap.js"></script>
</html>