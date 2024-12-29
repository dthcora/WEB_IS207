<?php
class CartModel {
    public function calculateTotalCart(&$session) {
        $total = 0;
        if (isset($session['cart']) && is_array($session['cart']) && !empty($session['cart'])) {
            foreach ($session['cart'] as $value) {
                if (isset($value['product_price'], $value['product_quantity'])) {
                    $total += $value['product_price'] * $value['product_quantity'];
                }
            }
        }
        $session['total'] = $total;
    }

    public function addToCart(&$session, $post) {
        if (!isset($session['cart'])) {
            $session['cart'] = [];
        }
        $product_size = $post['product_size'] ?? 'Không áp dụng';
        $product_key = $post['product_id'] . '_' . $product_size;

        if (!isset($session['cart'][$product_key])) {
            $session['cart'][$product_key] = [
                'product_id' => $post['product_id'],
                'product_name' => $post['product_name'],
                'product_size' => $product_size,
                'product_price' => $post['product_price'],
                'product_quantity' => intval($post['product_quantity']),
                'product_image' => $post['product_image'],
            ];
        } else {
            return "Sản phẩm đã có trong giỏ hàng!";
        }
    }

    public function removeFromCart(&$session, $post) {
        $product_key = $post['product_id'] . '_' . ($post['product_size'] ?? "null");

        if (isset($session['cart'][$product_key])) {
            unset($session['cart'][$product_key]);
        } else {
            return "Sản phẩm không tồn tại trong giỏ hàng!";
        }
    }

    public function updateQuantity(&$session, $post) {
        $product_key = $post['product_id'] . '_' . ($post['product_size'] ?? "null");
        $product_quantity = intval($post['product_quantity']);

        if ($product_quantity > 0) {
            if (isset($session['cart'][$product_key])) {
                $session['cart'][$product_key]['product_quantity'] = $product_quantity;
            } else {
                return "Sản phẩm không tồn tại trong giỏ hàng!";
            }
        } else {
            return "Số lượng sản phẩm phải lớn hơn 0!";
        }
    }
}
?>
