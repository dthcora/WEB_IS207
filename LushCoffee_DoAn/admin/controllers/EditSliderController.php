<?php
require_once '../models/EditSlider.php';

class SliderController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new SliderModel($db);
    }

    public function editSlider($slider_id)
    {
        // Get slider data
        $slider = $this->model->getSliderById($slider_id);

        if (!$slider) {
            // Handle not found error
            header("Location: list_slider.php?error=Slider not found");
            exit;
        }

        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $slider_name = $_POST['slider_name'];
            $slider_image = '';

            // Handle image upload
            if ($_FILES['slider_image']['name'] != "") {
                $slider_image = $_FILES['slider_image']['name'];
                $slider_image_tmp = $_FILES['slider_image']['tmp_name'];
                $target_dir = "../../assets/images/";
                $target_file = $target_dir . basename($slider_image);

                if (move_uploaded_file($slider_image_tmp, $target_file)) {
                    // Update slider with new image
                    if ($this->model->updateSlider($slider_id, $slider_name, $slider_image)) {
                        header("Location: list_slider.php?message=Slider updated successfully");
                        exit;
                    } else {
                        // Handle update failure
                        header("Location: edit_slider.php?slider_id=$slider_id&error=Failed to update slider");
                        exit;
                    }
                } else {
                    // Handle image upload failure
                    header("Location: edit_slider.php?slider_id=$slider_id&error=Failed to upload image");
                    exit;
                }
            } else {
                // Update slider without image change
                if ($this->model->updateSlider($slider_id, $slider_name, $slider['slider_image'])) {
                    header("Location: list_slider.php?message=Slider updated successfully");
                    exit;
                } else {
                    // Handle update failure
                    header("Location: edit_slider.php?slider_id=$slider_id&error=Failed to update slider");
                    exit;
                }
            }
        }

        // Render edit view
        require_once '../views/editsliderView.php';
    }
}
?>