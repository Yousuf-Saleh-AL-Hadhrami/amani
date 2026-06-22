
<?php 
session_start();
$title = 'Products';
include "./../authenticate.php";
include "./../isAdmin.php";
include "./../../includes/header.php";
include "./../../includes/adminNavbar.php";
include "./../../config/dbconnect.php";


$query = " SELECT categories.category_name , categories.description as category_description , products.* FROM products INNER JOIN categories ON products.category_id = categories.id";
$result = mysqli_query($connection , $query);

?>

<div class="container">


<h2 class="text-center mt-3">Products</h2>

<a href="create.php" class="btn btn-info btn-sm">Add New</a>
<?php 
if(isset($_SESSION['success'])):
echo "<p class='alert alert-success'> $_SESSION[success] </p>";
 unset($_SESSION['success']);
endif;

?>
 <table class="table table-bordered mt-3 text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
             <th>Image</th>
            <th> Proccess  </th>
        </tr>
    </thead>

    <tbody>
        <?php 

while($products = mysqli_fetch_assoc($result)):
?>

<tr>
    <td><?= $products['id'] ?></td>
    <td><?= $products['product_name'] ?></td>
    <td><?= $products['description'] ?></td>
    <td><?= $products['price'] ?></td>
    <td><?= $products['category_name'] ?></td>
    <td><img src="<?=$products['image']?>" width='30'></td>


    <td>
        <a class="btn btn-primary btn-sm">Edit</a>

        <form action="" method="post" class="d-inline-block">
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </td>

</tr>


<?php
endwhile;



       ?>
    </tbody>
 </table>




</div>

<?php 

include "./../../includes/footer.php";