<?php
class Slider {
    private $conn;
    private $table = "slider";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * Thêm một slider mới vào cơ sở dữ liệu
     *
     * @param string $slider_name Tên slider
     * @param string $slider_image Tên file hình ảnh slider
     * @return bool Trả về true nếu thành công, ngược lại là false
     */
    public function createSlider($slider_name, $slider_image) {
        $sql = "INSERT INTO $this->table (slider_name, slider_image) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $slider_name, $slider_image);
            return $stmt->execute();
        } else {
            return false; // Trả về false nếu chuẩn bị truy vấn thất bại
        }
    }

    /**
     * Lấy danh sách tất cả slider
     *
     * @return array|false Mảng chứa dữ liệu slider, hoặc false nếu lỗi
     */
    public function getAllSliders() {
        $sql = "SELECT * FROM $this->table";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC); // Trả về danh sách slider dưới dạng mảng liên kết
        } else {
            return false;
        }
    }
}
?>
