<?php

include_once('../config/connection.php');

class UserModel {
    // Hàm xóa sản phẩm từ cơ sở dữ liệu
    public function deleteUser($product_id) {
        global $conn;
        
        // Chuẩn bị câu lệnh SQL để xóa sản phẩm
        $stmt = $conn->prepare('DELETE FROM users WHERE user_id = ?');
        $stmt->bind_param('i', $product_id);

        // Thực thi câu lệnh SQL và trả về kết quả
        return $stmt->execute();
    }
}
?>
