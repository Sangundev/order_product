<?php
class Db {
    protected static $connection;

    public function connect() {
        if (!isset(self::$connection)) {
            $hostname = "localhost";
            $username = "root";
            $password = "";     
            $database = "ql_nha_hang"; 
            
            self::$connection = new mysqli($hostname, $username, $password, $database);
            
            // Kiểm tra kết nối
            if (self::$connection->connect_error) {
                die("Kết nối thất bại: " . self::$connection->connect_error);
            } 
            // echo "Kết nối thành công"; // Xuất thông báo thành công khi kết nối
        }
        
        return self::$connection;
    }

    public function query_execute($queryString) {
        $connection = $this->connect();
        $result = $connection->query($queryString);
        return $result;
    }

    public function select_to_array($queryString, $offset = 0, $limit = 10) {
        $rows = array();
        $queryString .= " LIMIT $offset, $limit";
        $result = $this->query_execute($queryString);
        if ($result === false) {
            return false;
        }
    
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        $result->free(); // Giải phóng bộ nhớ sau khi sử dụng
        return $rows;
    }
    
}

// Ví dụ sử dụng:
$db = new Db();
$db->connect(); // Dòng này sẽ kích hoạt kết nối và hiển thị "Kết nối thành công" nếu thành công.
 ?>
