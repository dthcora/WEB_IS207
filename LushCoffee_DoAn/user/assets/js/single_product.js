// Xử lý thay đổi ảnh chính khi click vào ảnh nhỏ
document.querySelectorAll('.small-img').forEach((img) => {
    img.addEventListener('click', function () {
        const mainImg = document.getElementById('mainImg');
        mainImg.src = this.src;
    });
});

// Xử lý thay đổi giá khi chọn size
document.querySelectorAll('input[name="product_size"]').forEach((radio) => {
    radio.addEventListener('change', function () {
        const priceElement = document.querySelector('.product-price');
        if (!priceElement || !priceElement.dataset.basePrice) return;

        const basePrice = parseInt(priceElement.dataset.basePrice, 10);
        let newPrice = basePrice;

        // Tính giá mới theo size
        if (this.value === 'M') {
            newPrice += 5000;
        } else if (this.value === 'L') {
            newPrice += 10000;
        }

        // Cập nhật hiển thị giá mới
        priceElement.textContent = newPrice.toLocaleString('vi-VN') + ' VND';

        // Cập nhật giá trị cho form
        const priceInput = document.querySelector('input[name="product_price"]');
        if (priceInput) {
            priceInput.value = newPrice;
        }
    });
});

// Gán giá trị giá ban đầu nếu không có size chọn
document.addEventListener('DOMContentLoaded', function () {
    const priceElement = document.querySelector('.product-price');
    if (priceElement && priceElement.dataset.basePrice) {
        const basePrice = parseInt(priceElement.dataset.basePrice, 10);
        priceElement.textContent = basePrice.toLocaleString('vi-VN') + ' VND';
        const priceInput = document.querySelector('input[name="product_price"]');
        if (priceInput) {
            priceInput.value = basePrice;
        }
    }
});
