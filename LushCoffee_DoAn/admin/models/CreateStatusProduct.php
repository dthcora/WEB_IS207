<?php

class StatusProductModel {

    // Thêm status sản phẩm mới
    public function addStatusProduct($status_products_name) {
        global $conn;

        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare('INSERT INTO status_products (status_products_name) VALUES (?)');
        $stmt->bind_param('s', $status_products_name);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
