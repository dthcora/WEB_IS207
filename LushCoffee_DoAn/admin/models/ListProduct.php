<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy danh sách sản phẩm với phân trang
    public function getProducts($offset, $limit) {
        $sql = "
            SELECT 
            ROW_NUMBER() OVER (ORDER BY products.product_id DESC) AS stt,
            products.product_id,
            products.product_name,
            categories.category_name,
            products.product_price,
            status_products.status_products_name,  
            products.product_image,
            products.quantity AS quantity,
            COALESCE(SUM(order_items.product_quantity), 0) AS total_sold_quantity,
            (products.quantity - COALESCE(SUM(order_items.product_quantity), 0)) AS new_product
            FROM products
            LEFT JOIN categories ON products.category_id = categories.category_id
            LEFT JOIN status_products ON products.status_products_id = status_products.status_products_id
            LEFT JOIN order_items ON products.product_id = order_items.product_id
            GROUP BY products.product_id, categories.category_name, status_products.status_products_name, products.product_image, products.quantity
            ORDER BY products.product_id DESC
            LIMIT ?, ?
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $offset, $limit);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Lấy tổng số lượng sản phẩm
    public function getTotalProducts() {
        $sql = 'SELECT COUNT(*) as count FROM products';
        return $this->conn->query($sql)->fetch_assoc()['count'];
    }

    // Cập nhật trạng thái sản phẩm hết hàng
    public function updateZeroQuantityStatus() {
        $sql = "UPDATE products SET status_products_id = 6 WHERE quantity = 0";
        return $this->conn->query($sql);
    }
}
?>
