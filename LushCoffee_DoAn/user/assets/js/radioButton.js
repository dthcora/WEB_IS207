document.querySelectorAll('input[name="category"]').forEach((radio) => {
    radio.addEventListener('change', function() {
        // Khi một radio button được chọn, chuyển hướng tới trang tương ứng
        var categories = this.value.toLowerCase(); // Lấy giá trị của category (TOPS, BOTTOMS, BAGS)
        if (categories) {
            window.location.href = categories + '.php'; // Chuyển hướng đến trang tương ứng
        }
    });
});