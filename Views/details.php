<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../styles/stylesdl.css">
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
                echo '<div class="product-image">';
                echo '<strong class="product-name">' . $productDetails['ten_mon'] . '</strong>';
                echo '<img src="' . $imagePath . '" alt="Product Image">';
                
                echo '</div>';
                // Hiển thị thông tin chi tiết của sản phẩm
                echo "<div class='product-details'>"; // Đảm bảo thông tin chi tiết không trôi ra ngoài ảnh
                echo "<p class='short-description'>" . $productDetails['noi_dung_tom_tat'] . "</p>"; // Display short description
                echo "<p class='long-description'>" . $productDetails['noi_dung_chi_tiet'] . "</p>"; // Display long description
                echo "<p><strong>Price:</strong> " . $productDetails['don_gia'] . " VND</p>"; // Display price
                echo "<div class='quantity-box'>";
                echo "<label for='quantity'>SL: </label>"; // Add label for quantity
                echo "<input type='number' min='1' value='1' id='quantity'>"; // Input for quantity
                echo '<button class="buy-now-btn">Buy Now</button>'; // Add Buy Now button
                echo "</div>";
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
