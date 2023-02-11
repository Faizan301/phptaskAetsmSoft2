<?php
include('connection.php');

if(isset($_POST['insert_category']))
{
    $category_name = $_POST['category_name'];

    $insert = "insert into categories (categoryName) values ('$category_name')";
    $result = mysqli_query($con,$insert);
    if($result){
        echo "<script>alert('Category inserted successfully')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Categories</h1>
        <form action="" method="post">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control" required="required" autocomplete="off">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" value="Insert Category" name="insert_category" class="text-light btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>

</html>