<?php
require_once '../config/connection.php';
require_once '../controllers/EditProductController.php';
// Initialize controller
$productController = new ProductController($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $data = [
        'product_id' => $_POST['product_id'],
        'product_name' => $_POST['product_name'],
        'product_price' => $_POST['product_price'],
        'product_price_discount' => $_POST['product_price_discount'],
        'product_description' => $_POST['product_description'],
        'product_color' => $_POST['product_color'],
        'product_category' => $_POST['product_category'],
        'product_status' => $_POST['product_status'],
        'quantity' => $_POST['quantity'],
    ];

    // Handle uploaded images
    $imageFields = ['product_image', 'product_image2', 'product_image3', 'product_image4'];
    $uploadedImages = [];
    foreach ($imageFields as $imageField) {
        if (!empty($_FILES[$imageField]['name'])) {
            $imageName = $_FILES[$imageField]['name'];
            $imageTmpName = $_FILES[$imageField]['tmp_name'];
            $imagePath = '../assets/images/' . $imageName;
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                $uploadedImages[$imageField] = $imageName;
            }
        } else {
            $uploadedImages[$imageField] = isset($_POST['existing_' . $imageField]) ? $_POST['existing_' . $imageField] : '';
        }
    }

    // Update the product
    if ($productController->updateProduct($data, $uploadedImages)) {
        header('Location: list_products.php?message=Products updated successfully');
        exit();
    } else {
        echo "Error updating product.";
    }
} else {
    // Fetch product details for editing
    $product_id = $_GET['product_id'];
    $product = $productController->getProduct($product_id);
    $categories = $productController->getCategories();
    $status_products = $productController->getStatusProducts();
    require_once '../views/editproductView.php';
}
