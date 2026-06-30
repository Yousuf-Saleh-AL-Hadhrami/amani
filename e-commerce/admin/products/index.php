
<?php 
session_start();
$title = 'Products';
include "./../authenticate.php";
include "./../isAdmin.php";
include "./../../includes/header.php";
include "./../../includes/adminNavbar.php";
include "./../../config/dbconnect.php";



$query = " SELECT categories.category_name , categories.description
           AS category_description , products.* FROM products
           INNER JOIN categories ON products.category_id = categories.id WHERE 1";

if(isset($_GET['search']))
{
    $query .= " AND product_name LIKE '%". $_GET['search'] ."%'
                OR price= '$_GET[search]'";
}


// echo $query;

// exit;



$result = mysqli_query($connection , $query);

$_SESSION['csrf_token'] = bin2hex(random_bytes(32))

?>

<div class="container">


<h2 class="text-center mt-3">Products</h2>

<div class="w-100 d-flex justify-content-between align-items-center gap-3">
    <div>
        <a href="create.php" class="btn btn-info btn-sm">Add New</a>
    </div>

    <div>
        <form action="" class="d-flex gap-2">
            <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Search Name Or Price">
            <button type="submit" class="btn btn-primary btn-sm" name="filter">Search</button>
        </form>
    </div>
</div>

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
        <a  href="edit.php?id=<?=  $products['id']?> " class="btn btn-primary btn-sm">Edit</a>

        <form action="delete.php" method="post" class="d-inline-block">
             <input type="hidden" name="_token" value="<?= $_SESSION['csrf_token'] ?>">
             <input type="hidden" name="product_id" value="<?= $products['id'] ?>">
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