<?php
class SliderModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getSliderById($slider_id)
    {
        $stmt = $this->db->prepare("SELECT slider_name, slider_image FROM slider WHERE slider_id = ?");
        $stmt->bind_param("i", $slider_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function updateSlider($slider_id, $slider_name, $slider_image)
    {
        $stmt = $this->db->prepare("UPDATE slider SET slider_name = ?, slider_image = ? WHERE slider_id = ?");
        $stmt->bind_param("ssi", $slider_name, $slider_image, $slider_id);
        return $stmt->execute();
    }
}
?>