<?php
require_once __DIR__ . '/../models/ListSlider.php';

class SliderController {
    private $sliderModel;

    public function __construct($conn) {
        $this->sliderModel = new SliderModel($conn);
    }

    public function index() {
        // Get pagination parameters
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $limit;

        // Fetch sliders
        $sliders = $this->sliderModel->getSliders($limit, $offset);

        // Include the view to display sliders
        include __DIR__ . '/../views/listsliderView.php';
    }
}
