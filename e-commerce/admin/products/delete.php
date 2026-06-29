<?php 
session_start();
include "./../../config/dbconnect.php";
include "./../../config/storage.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_token'], $_SESSION['csrf_token']) && $_POST['_token'] === $_SESSION['csrf_token']) {
    
    $product_id = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);

    if ($product_id !== false) {
        
        // 1. جلب مسار الصورة بأمان باستخدام Prepared Statement
        $image_path = null;
        $select_query = "SELECT image FROM products WHERE id = ? LIMIT 1";
        $select_stmt = mysqli_prepare($connection, $select_query);
        
        if ($select_stmt) {
            mysqli_stmt_bind_param($select_stmt, 'i', $product_id);
            mysqli_stmt_execute($select_stmt);
            $res = mysqli_stmt_get_result($select_stmt);
            $product = mysqli_fetch_assoc($res);
            if ($product) {
                $image_path = $product['image'];
            }
            mysqli_stmt_close($select_stmt);
        }

        // 2. تجهيز وتنفيذ استعلام الحذف
        $query_string = "DELETE FROM products WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query_string);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $product_id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                // 3. حذف الصورة من السيرفر إذا كانت موجودة (منفصلة عن التوجيه)
                if (!empty($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
                
                // 4. التوجيه وحفظ رسالة النجاح (تنفذ دائماً عند نجاح الحذف)
                $_SESSION['success'] = 'تم حذف المنتج بنجاح';
                mysqli_stmt_close($stmt); // إغلاق الاستعلام قبل التوجيه
                header("Location: index.php");
                exit;
            }
            
            mysqli_stmt_close($stmt);
        }
    }
    
    // في حال فشل الحذف أو كان الآيدي غير صحيح
    $_SESSION['error'] = 'حدث خطأ أثناء محاولة الحذف';
    header("Location: index.php");
    exit;

} else {
    // التوكن غير صحيح أو طريقة الطلب ليست POST
    die("Not Allowed to access the page. Token invalid.");
}
