<?php
include('connection.php');

if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];

    $query = "delete from products where productId = $id";
    $res = mysqli_query($con,$query);
    if($res){
        // echo "Product Deleted Successfully";
        header('location:display_products.php');
    }
}
?>