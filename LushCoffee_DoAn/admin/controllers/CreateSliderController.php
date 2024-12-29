<?php
require_once '../models/CreateSlider.php';

class SliderController {
    private $sliderModel;

    public function __construct($conn) {
        $this->sliderModel = new Slider($conn);
    }

    public function createSlider($slider_name, $slider_image_tmp, $slider_image_name) {
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($slider_image_name);

        // Di chuyển tệp được tải lên đến thư mục đích
        if (move_uploaded_file($slider_image_tmp, $target_file)) {
            if ($this->sliderModel->createSlider($slider_name, $slider_image_name)) {
                return ['success' => true, 'message' => 'Slider created successfully'];
            } else {
                return ['success' => false, 'message' => 'Failed to create slider in database'];
            }
        } else {
            return ['success' => false, 'message' => 'Failed to upload image'];
        }
    }

    public function getAllSliders() {
        return $this->sliderModel->getAllSliders();
    }
}
?>
