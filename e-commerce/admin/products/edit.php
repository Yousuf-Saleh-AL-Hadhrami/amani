
<?php 
session_start();
$title = 'Edit Product';
include "./../authenticate.php";
include "./../isAdmin.php";
include "./../../includes/header.php";
include "./../../includes/adminNavbar.php";
include "./../../config/dbconnect.php";
include "./../../config/storage.php";
include "./../../includes/functions.php";


$path = '../'.PATH;

$id = $_GET['id'];

$query = " SELECT * FROM products WHERE id = $id ";
$result = mysqli_query($connection , $query);
$product = mysqli_fetch_assoc($result);


$query = " SELECT * FROM categories";
$result2 = mysqli_query($connection , $query);



if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $full_path = uploadImage($_FILES['image'] , $path);

        // INSERT TO DATABASE 

        $insert = mysqli_query($connection , 
             " INSERT INTO products VALUES(NOT NULL ,'$product_name','$description',$price, $category_id,'$full_path');"
        );

        if($insert)
            {
                $_SESSION['success'] = 'The Product is Editd Successfully!';
                header("location: index.php");
                exit;
            }


    }



?>

<div class="container">


<h2 class="text-center mt-3">Edit Product [ <?=  isset($_GET['id']) ?? 0 ?>] </h2>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0">تعديلمنتج جديد</h5>
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        
                        <!-- product_name -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label fw-bold">اسم المنتج</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" maxlength="255" value="<?= $product['product_name'] ?> ">
                            <div class="invalid-feedback">يرجى إدخال اسم المنتج.</div>
                        </div>

                        <!-- category_id (Foreign Key) -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">القسم / الفئة</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">اختر القسم المتاح...</option>
                                <!-- يتم جلب هذه الخيارات ديناميكياً من جدول categories -->
                                
                                <?php 
                               while($categories = mysqli_fetch_assoc($result2)):
                                    
                                echo "<option value='$categories[id]'";
                                
                                if($categories['id'] == $product['category_id']) 
                                    {
                                        echo " selected";
                                    }
                                echo " >$categories[category_name]</option>";
                                    
                               endwhile;
                               ?>
                            </select>
                            <div class="invalid-feedback">يرجى اختيار القسم التابع له المنتج.</div>
                        </div>

                        <!-- price -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">السعر</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" max="999.99" required placeholder="0.00">
                                <div class="invalid-feedback">يرجى إدخال سعر صحيح (حد أقصى 999.99 بناءً على دقة الحقل DECIMAL).</div>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">الوصف</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="اكتب وصفاً تفصيلياً للمنتج..."></textarea>
                        </div>

                        <?php 

          if(file_exists($product['image'])):

           echo "<img src='$product[image]' />";

          endif;
          
?>
                        
                        <!-- image -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">Image</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="file" class="form-control" id="image" name="image" >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <!-- أزرار التحكم -->
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="reset" class="btn btn-light border">إلغاء</button>
                            <button type="submit" class="btn btn-primary px-4">حفظ المنتج</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<?php 

include "./../../includes/footer.php";