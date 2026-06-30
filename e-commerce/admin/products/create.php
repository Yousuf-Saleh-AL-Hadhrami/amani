<?php 
session_start();
$title = 'Create Product';
include "./../authenticate.php";
include "./../isAdmin.php";
include "./../../includes/header.php";
include "./../../includes/adminNavbar.php";
include "./../../config/dbconnect.php";
include "./../../config/storage.php";
include "./../../includes/functions.php";

$path = '../'.PATH;

$query = "SELECT * FROM categories";
$result = mysqli_query($connection, $query);

$formErrors = []; // تعريف المصفوفة في الأعلى لتجنب أخطاء الإشعار (Notice) في حقول HTML

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = trim($_POST['product_name']);
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // التحقق من اسم المنتج
    if (empty($product_name)) {
        $formErrors['empty_product'] = 'إسم المنتج مطلوب';
    } elseif (strlen($product_name) > 15) {
        // تم تغيير المفتاح إلى empty_product ليعرض تحت الحقل بشكل صحيح
        $formErrors['empty_product'] = 'إسم المنتج يجب أن لا يتعدى 15 حرف';
    } elseif (is_numeric($product_name)) { 
        $formErrors['empty_product'] = 'إسم المنتج يجب أن لا يكون رقماً فقط';
    }

    // التحقق من السعر
    if ($price === '') {
        $formErrors['price_number'] = 'السعر مطلوب';
    } elseif (!is_numeric($price)) {
        $formErrors['price_number'] = 'السعر يجب أن يكون رقم وليس نص';
    }

    // التحقق من وجود الفئة
    if (empty($category_id)) {
        $formErrors['category_id'] = 'يرجى اختيار القسم التابع له المنتج';
    }

    // إذا لم تكن هناك أخطاء، نرفع الصورة ونحفظ في قاعدة البيانات
    if (empty($formErrors)) {
        
        // رفع الصورة فقط عند نجاح التحقق من النصوص
        $full_path = uploadImage($_FILES['image'], $path);

        // تنظيف البيانات لمنع ثغرات SQL Injection
        $product_name = mysqli_real_escape_string($connection, $product_name);
        $description = mysqli_real_escape_string($connection, $description);
        $category_id = (int)$category_id;
        $price = (float)$price;
        $full_path = mysqli_real_escape_string($connection, $full_path);

        // تعديل الاستعلام لإدراج الأسماء الصريحة للأعمدة وتعديل NOT NULL إلى NULL إذا كان الحقل تلقائي الزيادة
        $insert_query = "INSERT INTO products (id, product_name, description, price, category_id, image) 
                         VALUES (NULL, '$product_name', '$description', $price, $category_id, '$full_path')";
        
        $insert = mysqli_query($connection, $insert_query);

        if ($insert) {
            $_SESSION['success'] = 'The Product is Created Successfully!';
            header("location: index.php");
            exit;
        } else {
            $formErrors['database'] = 'حدث خطأ أثناء الحفظ في قاعدة البيانات: ' . mysqli_error($connection);
        }
    }
}
?>

<div class="container">
<h2 class="text-center mt-3">Create Products</h2>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <!-- عرض خطأ قاعدة البيانات إن وجد -->
            <?php if(isset($formErrors['database'])): ?>
                <div class="alert alert-danger"><?= $formErrors['database'] ?></div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0">إضافة منتج جديد</h5>
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <!-- product_name -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label fw-bold">اسم المنتج</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= htmlspecialchars($_POST['product_name'] ?? '') ?>" placeholder="أدخل اسم المنتج">
                            <?= isset($formErrors['empty_product']) ? "<p class='text-danger mt-1'> " . $formErrors['empty_product'] . "</p>" : "" ?>
                        </div>

                        <!-- category_id (Foreign Key) -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">القسم / الفئة</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">اختر القسم المتاح...</option>
                                <?php while($category = mysqli_fetch_assoc($result)): ?>
                                    <option value="<?= $category['id'] ?>" <?= (isset($_POST['category_id']) && $_POST['category_id'] == $category['id']) ? 'selected' : '' ?>>
                                        <?= $category['category_name'] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <?= isset($formErrors['category_id']) ? "<p class='text-danger mt-1'>" . $formErrors['category_id'] . "</p>" : "" ?>
                        </div>

                        <!-- price -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">السعر</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($_POST['price'] ?? '') ?>" placeholder="0.00">
                            </div>
                            <?= isset($formErrors['price_number']) ? "<p class='text-danger mt-1'>" . $formErrors['price_number'] . "</p>" : '' ?>
                        </div>

                        <!-- description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">الوصف</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="اكتب وصفاً تفصيلياً للمنتج..."><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                        </div>

                        <!-- image -->
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">صورة المنتج</label>
                            <input type="file" class="form-control" id="image" name="image">
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
?>
