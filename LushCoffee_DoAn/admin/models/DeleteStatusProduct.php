<?php

include_once('../config/connection.php');

class StatusProductModel {
    // Hàm xóa sản phẩm từ cơ sở dữ liệu
    public function deleteStatusProduct($status_products_id) {
        global $conn;
        
        // Chuẩn bị câu lệnh SQL để xóa sản phẩm
        $stmt = $conn->prepare('DELETE FROM status_products WHERE status_products_id = ?');
        $stmt->bind_param('i', $status_products_id);

        // Thực thi câu lệnh SQL và trả về kết quả
        return $stmt->execute();
    }
}
?>
