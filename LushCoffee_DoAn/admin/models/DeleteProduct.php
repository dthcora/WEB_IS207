<?php

include_once('../config/connection.php');

class ProductModel {
    // Hàm xóa sản phẩm từ cơ sở dữ liệu
    public function deleteProduct($product_id) {
        global $conn;
        
        // Chuẩn bị câu lệnh SQL để xóa sản phẩm
        $stmt = $conn->prepare('DELETE FROM products WHERE product_id = ?');
        $stmt->bind_param('i', $product_id);

        // Thực thi câu lệnh SQL và trả về kết quả
        return $stmt->execute();
    }
}
?>
