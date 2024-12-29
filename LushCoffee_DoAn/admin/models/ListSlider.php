<?php

class SliderModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getSliders($limit, $offset) {
        $sql = "
            SELECT 
                slider_id,
                slider_name,
                slider_image
            FROM slider
            ORDER BY slider_id ASC
            LIMIT ?, ?
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $offset, $limit);
        $stmt->execute();
        return $stmt->get_result();
    }
}
