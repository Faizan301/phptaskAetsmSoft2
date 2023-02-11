<?php
include('connection.php');
$id = $_GET['updateId'];
$sql = "select * from products where productId = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$productName = $row['productName'];
$Category  = $row['Category'];
$cate = "select * from categories where categoryId = $Category ";
$cat = mysqli_query($con, $cate);
if ($cat) {
    while ($row = mysqli_fetch_assoc($cat)) {
        $catname =  $row['categoryName'];
        $catid =  $row['categoryId'];
    }
}

if (isset($_POST['update_product'])) {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];

    $update = "update products set productId = $id, productName = '$product_name', Category = '$product_category' where productId = $id ";
    $result = mysqli_query($con, $update);
    if ($result) {
        //  echo "<script>alert('Product updated successfully')</script>";
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
                <input type="text" name="product_name" id="product_name" class="form-control" required autocomplete="off" value="<?php echo $productName; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Categories</label>
</br>
                <select name="product_category" class="form-label form-select">
                    <option selected disabled <?php echo "$catid" ?>><?php echo "$catname" ?></option>
                    <?php
                    $show = "select * from categories WHERE NOT categoryName ='$catname'";
                    $res = mysqli_query($con, $show);
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <option value="<?php echo $product_category = $row['categoryId'] ?>"><?php echo $row['categoryName'] ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>
            <div class="w-50 m-auto">
                <input type="submit" value="Update Product" name="update_product" class="text-light btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>

</html>