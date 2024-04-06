<?php
require_once("../config/db.class.php");

class MonAn {
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

   public function getAllMonAn($offset = 0, $limit = 10) {
    $query = "SELECT * FROM mon_an"; // Câu truy vấn không cần thêm LIMIT ở đây
    return $this->db->select_to_array($query);

}

public function getMonAnById($id) {
    $query = "SELECT * FROM mon_an WHERE ma_mon = $id";
    $result = $this->db->select_to_array($query);
    if ($result) {
        return $result[0];
    } else {
        return false;
    }
}
    
}
?>
