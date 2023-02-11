<?php
include('connection.php');

if (isset($_POST['insert_product'])) {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];

    $insert = "insert into products (productName,Category) values ('$product_name','$product_category')";
    $result = mysqli_query($con, $insert);
    if ($result) {
        // echo "<script>alert('Product inserted successfully')</script>";
        header('location:display_products.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Products</h1>
        <form action="" method="post">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required autocomplete="off">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select" required>
                    <?php
                    $show = "select * from categories";
                    $res = mysqli_query($con,$show);
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <option value="<?php echo $product_category = $row['categoryId'] ?>"><?php echo $row['categoryName'] ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
            </div>
            <div class="w-50 m-auto">
                <input type="submit" value="Insert Products" name="insert_product" class="text-light btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>

</html>