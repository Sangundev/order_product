<?php
require_once("../Models/MonAn.php");

class MonAnController {
    private $monAnModel;

    public function __construct() {
        $this->monAnModel = new MonAn();
    }

    public function index() {
        $monAnModel = new MonAn(); // Tạo một thể hiện mới của lớp MonAn
        $offset = isset($_GET['page']) ? ($_GET['page'] - 1) * 10 : 0;
        $dishes = $monAnModel->getAllMonAn($offset); // Gọi phương thức từ đối tượng mới này

        include 'index.php';
    }    
}
?>
