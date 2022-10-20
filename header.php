<?php
$id_bask = $_COOKIE["id_bask"];
if(!isset($id_bask))
{
    $uniq_ID = uniqid("ID");
    setcookie("id_bask", $uniq_ID, time()+60*60*24*14);
}
else
setcookie("id_bask", $id_bask, time()+60*60*24*14);
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UFT-8">
        <link rel = "stylesheet" href="assets/css/style1.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/e6c5fdfa08.js" crossorigin="anonymous"></script>

        <title>Soulmate</title>
    </head>
    <body>

        <header class="header">
            <div class="container">
                <div class="header_inner">
                    <div class="header_left">+7 (495) 520-75-12
                        г.Казань<br>Ежедневно с 11:00 до 21:00
                    </div>
                    <div class="header_right">
                        <a class="nav_link" href="basket.php">Корзина</a>
                        <?php
                        if(isset($_SESSION["log"]))
                        {
                            //print $_SESSION["log"];
                            print "<a class='nav_link' href='cabinet.php'>Личный кабинет</a>";
                        }
                        else
                        {
                            print"<a class='nav_link' href='auto.php'>Личный кабинет</a>";
                        }
                        ?>
                    </div>

                    <div class="header_logo">
                        <a class="nav_link_logo" href="index.php">Soulmate</a>
                    </div>

                    <nav class="nav">
                        <ul class="top_menu">
                            <li><a class="nav_link" href="test.php">Новинки</a></li>
                            <li><a class="nav_link" href="#">Коллекции</a>
                                <ul class="sub_menu">
                                    <li>
                                        <ul>
                                        <?php
                                        $conn = mysqli_connect('localhost', 'root', 'root','jewelry');
                                        $sql = "SELECT * FROM Collections";

                                        $result = mysqli_query($conn, $sql);
                                        $rows=mysqli_num_rows($result);
                                        $rows_count=ceil($rows/7);
                                        for ($h=0;$h<7;$h++) {
                                            for ($k=0; $k<$rows_count; $k++) {
                                                $fetch = mysqli_fetch_array($result);
                                                if ($fetch!="") echo "<li><a href='show.php?type=1&id_col=$fetch[id_col]'>$fetch[name_col]</a></li>";
                                            }
                                        }?>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li>
                                                <a href="Img" class="link_image">
                                                    <img src="images1/Кольцо23.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="nav_link" href="#">Каталог</a>
                                <ul class="sub_menu">
                                    <li>
                                        <ul>
                                        <?php
                                        $conn = mysqli_connect('localhost', 'root', 'root','jewelry');
                                        $sql = "SELECT * FROM Categories";

                                        $result = mysqli_query($conn, $sql);
                                        $rows=mysqli_num_rows($result);
                                        $rows_count=ceil($rows/7);
                                        for ($h=0;$h<7;$h++) {
                                            for ($k=0; $k<$rows_count; $k++) {
                                                $fetch = mysqli_fetch_array($result);
                                                if ($fetch!="") echo "<li><a href='show.php?type=2&id_cat=$fetch[id_cat]'>$fetch[name_cat]</a></li>";
                                            }
                                        }?>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li>
                                                <a href="#" class="link_image">
                                                    <img src="images1/Серьги43.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="nav_link" href="xml.php">Сертификаты</a></li>
                            <li><a class="nav_link" href="auto.php">Контакты</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </header>

        <div class="content">
