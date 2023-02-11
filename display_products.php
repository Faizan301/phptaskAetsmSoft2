<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Products</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <div class="container">
        <button class="btn btn-info my-5"><a href="insert_product.php" class="text-light text-decoration-none">Add Products</a></button>

        <table class="table table-bordered ">
    <thead class="bg-info text-center">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

            <?php
            $get_product = "SELECT productId,productName,categories.categoryName FROM `products` join categories on Category = categories.categoryId;
            ";
            $result = mysqli_query($con,$get_product);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $productId = $row['productId'];
                    $productName = $row['productName'];
                    $CategoryId  = $row['categoryName'];
                    echo" <tr class='text-center'>
                        <td>$productId</td>
                        <td>$productName</td>
                        <td>$CategoryId</td>
                        <td><a href='update_product.php?updateId=$productId' class='text-light' name='edit'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='delete_product.php?deleteId=$productId' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
                    ";
                }
                
            }
            ?>
            
            
           
    </tbody>
</table>

    </div>
<body>
</body>

</html>