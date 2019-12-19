<?php
	include("include/db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <title>SCP Shop</title>
    <link rel="icon" href="images/icon.ico" type="shortcut icon">
</head>
    <body>  
        <div id="block-body">
            <?php include("include/block-header.php")?>
            <hr class="style-four"/>
            <div id="block-right">
                <?php include("include/block-category.php")?>
            </div>
            <div id="block-content">
                <div id="block-sorting">
                    <p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>
                    <ul id="options-list">
                        <li>Сортировать:</li>
                        <li><a id="select-sort">Без сортировки</a>
                            <ul id="sorting-list">
                                <li><a href="">От дешёвых к дорогим</a></li>
                                <li><a href="">От дорогих к дешёвым</a></li>
                                <li><a href="">От А до Я</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <ul id="block-product-grid">
                        <?php
                        $result = mysqli_query($link, "SELECT * FROM table_products");
                        if(!$result || mysqli_num_rows($result) > 0)
                        {
                            $row = mysqli_fetch_array($result);
                            do
                            {
                            
                                 if ($row["image"] != "" && file_exists('./upload_images/'.$row["image"])){
                                    $img_path = './upload_images/'.$row["image"];
                                    $max_width = 200;
                                    $max_height = 200;
                                    list($width, $height) = getimagesize($img_path);
                                    $ratioh = $max_height/$height;
                                    $ratiow = $max_width/$width;
                                    $ratio = min($ratioh, $ratiow);
                                    $width = intval($ratio*$width);
                                    $height = intval($ratio*$height);
                                 }
                                 else {
                                    $img_path = "/images/no-image.jpg";
                                    $width = 200;
                                    $height = 200;
                                 }
                                echo ('
                                    <li>
                                    <div class="block-images-grid"><center><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/></center></div>
                                    <p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
                                    <a class="add-cart-style-grid"></a>
                                    <p class="style-price-grid"><strong>'.$row["price"].'</strong> руб.</p>
                                    <div class="mini-features">'.$row["mini_features"].'</div>
                                    </li>
                                    ');
                            } while($row = mysqli_fetch_array($result));
                        }
                        
                        ?>
                </ul>
            </div>
            <?php include("include/block-footer.php")?>
        </div>
    </body>
</html>