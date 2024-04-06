<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../styles/stylesdl.css">
    </style>
</head>
<body>
    <div class="container">
        <?php
        require_once("../Models/MonAn.php");

        // Kiểm tra xem có tham số id được truyền vào không
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Tạo một thể hiện của lớp MonAn
            $monAnModel = new MonAn();

            // Lấy thông tin chi tiết của sản phẩm dựa trên id
            $productDetails = $monAnModel->getMonAnById($productId);

            // Kiểm tra xem sản phẩm có tồn tại không
            if ($productDetails) {
                // Hiển thị hình ảnh bên trái
                $imagePath = '../img/' . $productDetails['hinh']; // Đường dẫn đến hình ảnh
                echo '<div class="product">';
                echo '<img src="' . $imagePath . '" alt="Product Image">';
                // Hiển thị thông tin chi tiết của sản phẩm
                echo "<div class='product-details'>"; // Đảm bảo thông tin chi tiết không trôi ra ngoài ảnh
                echo "<h1>Product Details</h1>";
                echo "<strong>Name:</strong> " . $productDetails['ten_mon'] . "<br>";
                echo "<strong>Description:</strong> " . $productDetails['noi_dung_chi_tiet'] . "<br>";
                echo "<strong>Price:</strong> " . $productDetails['don_gia'] . " VND<br>";
                // Các thông tin khác về sản phẩm có thể được hiển thị ở đây
                echo "</div>";
                echo "</div>";
            } else {
                echo "Product not found.";
            }
        } else {
            echo "Product ID not specified.";
        }
        ?>
    </div>
</body>
</html>
