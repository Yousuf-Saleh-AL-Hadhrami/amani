
<?php 
session_start();
$title = 'Categories';
include "./../authenticate.php";
include "./../isAdmin.php";
include "./../../includes/header.php";
include "./../../includes/adminNavbar.php";
include "./../../config/dbconnect.php";


$query = " SELECT * FROM categories";
$result = mysqli_query($connection , $query);

?>

<div class="container">


<h2 class="text-center mt-3">Categories</h2>

 <table class="table table-bordered mt-3 text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Description</th>
            <th> Proccess  </th>
        </tr>
    </thead>

    <tbody>
        <?php 

while($categories = mysqli_fetch_assoc($result)):
?>

<tr>
    <td><?= $categories['id'] ?></td>
    <td><?= $categories['category_name'] ?></td>
    <td><?= $categories['description'] ?></td>

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