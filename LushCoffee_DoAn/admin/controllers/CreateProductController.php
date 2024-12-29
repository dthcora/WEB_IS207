<?php
require_once '../models/CreateProduct.php';
class ProductController {
    private $productModel;

    public function __construct($conn) {
        $this->productModel = new ProductModel($conn);
    }

    public function createProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_product'])) {
            $data = [
                'product_name' => $_POST['product_name'],
                'product_category' => $_POST['product_category'],
                'product_status' => $_POST['product_status'],
                'product_description' => $_POST['product_description'],
                'product_price' => filter_var($_POST['product_price'], FILTER_VALIDATE_FLOAT),
                'quantity' => $_POST['quantity'],
                'product_image' => null,
            ];

            // Validate product price
            if ($data['product_price'] === null || $data['product_price'] < 0) {
                die('Price is not valid');
            }

            // Handle image upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                $file_tmp_name = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $max_size = 7 * 1024 * 1024;

                if (!in_array($extension, $allowed_extensions)) {
                    die('Error: Only image files (jpg, jpeg, png, gif) are allowed.');
                }

                if ($file_size > $max_size) {
                    die('Error: File size exceeds the limit of 7MB.');
                }

                $data['product_image'] = $data['product_name'] . '.' . $extension;
                $image_path = '../assets/img/' . $data['product_image'];
                if (!move_uploaded_file($file_tmp_name, $image_path)) {
                    die('Error uploading file.');
                }
            }

            // Save product to database
            if ($this->productModel->createProduct($data)) {
                header('Location: list-product.php?message=Product added successfully');
                exit;
            } else {
                header('Location: list-product.php?error=Failed to add product');
                exit;
            }
        }

        // Render view
        $categories = $this->productModel->getCategories();
        $statuses = $this->productModel->getStatuses();
        include __DIR__ . '/../views/createproductView.php';
    }
}
?>
