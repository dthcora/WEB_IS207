<?php

include_once('../config/connection.php');

class CategoryModel {
    // Hàm xóa sản phẩm từ cơ sở dữ liệu
    public function deleteCategory($product_id) {
        global $conn;
        
        // Chuẩn bị câu lệnh SQL để xóa sản phẩm
        $stmt = $conn->prepare('DELETE FROM categories WHERE category_id = ?');
        $stmt->bind_param('i', $product_id);

        // Thực thi câu lệnh SQL và trả về kết quả
        return $stmt->execute();
    }
}
?>
