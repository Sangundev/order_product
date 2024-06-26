<?php
require_once("../Models/MonAn.php");
$monAnModel = new MonAn(); // Tạo một thể hiện mới của lớp MonAn
$offset = isset($_GET['page']) ? ($_GET['page'] - 1) * 10 : 0;
$dishes = $monAnModel->getAllMonAn($offset); // Gọi phương thức từ đối tượng mới này
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishes</title>
    <link rel="stylesheet" href="../styles/Styles.css">
</head>
<body>
    <div class="dishes-container">
        <div class="row">
            <?php 
            $count = 0;
            foreach ($dishes as $dish): ?>
                <div class="dish">
                    <?php $imagePath = '../img/' . $dish['hinh']; ?>
                    <img src="<?php echo $imagePath; ?>" alt="<?php echo $dish['ten_mon']; ?>">
                    <div class="dish-details">
                        <strong><?php echo $dish['ten_mon']; ?></strong><br>
                        <?php echo $dish['noi_dung_tom_tat']; ?> VND<br>
                        Price: <?php echo $dish['don_gia']; ?><br>
                        <br> <!-- Thêm thẻ br để ngăn cách giữa giá và nút Details -->
                        <a class="detail-button" href="details.php?id=<?php echo $dish['ma_mon']; ?>">Details</a>
                    </div>
                </div>
                <?php 
                $count++;
                if ($count % 4 == 0) echo '</div><div class="row">'; // Mỗi lần đếm đến 4 sản phẩm thì tạo một hàng mới
            endforeach; ?>
        </div> <!-- Close the last row -->
    </div>
</body>
</html>
