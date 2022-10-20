<?php
include("header.php"); ?>

<div class = "intro"></div>

        <section class="section">
            <div class="container">

                <div class="jew_boxes">
                    <div class="jew_item">
                        <div class="jew_img">
                            <img src="images1/cepochki.jpeg" alt="Cepochki">
                        </div>
                        <a class="jew_link" href="show.php?type=2&id_cat=1">Цепочки</a>
                    </div>
                    <div class="jew_item">
                        <div class="jew_img">
                            <img src="images1/ring.jpeg" alt="Rings">
                        </div>
                        <a class="jew_link" href="show.php?type=2&id_cat=2">Кольца</a>
                    </div>
                    <div class="jew_item">
                        <div class="jew_img">
                            <img src="images1/earing.jpg" alt="Earings">
                        </div>
                        <a class="jew_link" href="show.php?type=2&id_cat=3">Серьги</a>
                    </div>
                </div>
                <div class="jew_boxes">
                    <div class="jew_item">
                        <div class="jew_img">
                            <img src="images1/braslets.jpeg" alt="Braslets">
                        </div>
                        <a class="jew_link" href="show.php?type=2&id_cat=4">Браслеты</a>
                    </div>
                    <div class="jew_item">
                        <div class="jew_img">
                            <img src="images1/kaffs.jpeg" alt="Kaffs">
                        </div>
                        <a class="jew_link" href="show.php?type=2&id_cat=5">Каффы</a>
                    </div>
                    <div class="jew_item">
                        <div class="jew_img">
                            <img src="images1/kole.jpeg" alt="Kole">
                        </div>
                        <a class="jew_link" href="show.php?type=2&id_cat=6">Колье</a>
                    </div>
                </div>

            </div>
        </section>
        <!--<section class="form-questions" style="margin-top: 30vh;">
        <div class="container form-questions__content">
            <p>
            <h1>Книга отзывов</h1>
            </p>
            <form method="post">
                <p>Введите своё имя <input type="text" name="name"></p>
                <p>Введите свой комментарий <input type="text" name="comment"></p>
                <input type="submit" name="formSubmit" value="Submit" />
            </form>
            <p>
                <hr>Отзывы
            </p>
            <?php
            $mysqli = mysqli_connect("localhost", "root", "root") or die("пїЅпїЅ пїЅпїЅпїЅпїЅ пїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅ пїЅ пїЅпїЅпїЅпїЅпїЅпїЅпїЅ MySQL!");
            mysqli_set_charset($mysqli, 'cp1251');
            mysqli_select_db($mysqli, "jewelry") or die("пїЅпїЅ пїЅпїЅпїЅпїЅ пїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅ пїЅ пїЅпїЅпїЅпїЅ пїЅпїЅпїЅпїЅпїЅпїЅ!");

            $query = "SELECT * FROM guest WHERE 1";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
                echo '<b>Автор:</b>' . $row["name"] . ' <b>Отзыв:</b>' . $row["text"];
                echo '<br>';
            }


            if (isset($_POST['formSubmit'])) {
                $nameform = $_POST['name'];
                $nameform = str_replace('<', '&amp;lt;', $nameform);
                $nameform = str_replace('>', '&amp;gt;', $nameform);
                $commentform = $_POST['comment'];
                $commentform = str_replace('<', '&amp;lt;', $commentform);
                $commentform = str_replace('>', '&amp;gt;', $commentform);
                $name = '"' . $mysqli->real_escape_string($nameform) . '"';
                $comment = '"' . $mysqli->real_escape_string($commentform) . '"';
                $query = "INSERT INTO guest (name,text) VALUES ($name,$comment)";
                $result = $mysqli->query($query);
                if (!$result) {
                    die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
                }
                $mysqli->close();
                echo ("<meta http-equiv='refresh' content='1'>");
            }
            ?>
        </div>
    </section>-->

<?php include("footer.php"); ?>

