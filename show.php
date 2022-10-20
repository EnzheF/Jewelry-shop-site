<?php
include("header.php");
$conn = mysqli_connect('localhost', 'root', 'root','jewelry');

$type = $_GET["type"];
//$sql = "SELECT id_jel, name_jel, image_jel, image2, price, material, stone
//FROM jewelry";

if($type==1)
{
    $id_col = $_GET["id_col"];
    $strSQL1 = "SELECT id_jel, name_jel, image_jel, image2, price, material, stone, id_col
    FROM jewelry WHERE id_col=$id_col";

    /*$strSQL1 = "SELECT name_col FROM collections WHERE id_col=" . $id_col;
    $result = mysqli_query($conn, $strSQL1) or die("Не могу выполнить запрос!");
    if ($row = mysqli_fetch_array($result))
    $title = $row["name_col"];
    $strSQL1 = "SELECT  distinct id_jel, price, material, stone, image_jel, jewelry.name_jel, jewelry.id_col, name_col, jewelry.id_cat, name_cat FROM jewelry, collections, categories 
    WHERE jewelry.id_col=collections.id_col AND jewelry.id_cat=categories.id_cat AND jewelry.id_cat=" . $id_col;
    */
}
if($type==2)
{
    $id_cat = $_GET["id_cat"];
    $strSQL1 = "SELECT id_jel, name_jel, image_jel, image2, price, material, stone, id_cat
    FROM jewelry WHERE id_cat=$id_cat";

    /*$strSQL1 = "SELECT name_cat FROM categories WHERE id_cat=" . $id_cat;
    $result = mysqli_query($conn, $strSQL1) or die("Не могу выполнить запрос!");
    if ($row = mysqli_fetch_array($result))
    $title = $row["name_cat"];
    $strSQL1 = "SELECT  distinct id_jel, price, material, stone, image_jel, jewelry.name_jel, jewelry.id_col, name_col, jewelry.id_cat, name_cat FROM jewelry, collections, categories 
    WHERE jewelry.id_col=collections.id_col AND jewelry.id_cat=categories.id_cat AND jewelry.id_cat=" . $id_cat;
    */
}

$sth = $conn->query($strSQL1);
while ($result=$sth->fetch_array()) {
?>

<ul class="products clearfix">
    <li class="product-wrapper">
        <div class="product-item">
            <?php echo "<img src='images1/".$result['image_jel']."'>" ?>
            <div class="product-list">
                <h3><?php echo $result['name_jel'];?></h3>
                <span class="price"><?php echo $result['price'];?> ₽</span>
                <span class="material"><?php echo $result['material'];?> 
                <?php if($result['stone'] == "Без камней") echo " ";
                else echo $result['stone'];?></span>
                <a href="dobasket.php?type=1&id_jel=<?php print $result['id_jel'];?>" class="button" > В корзину</a>
            </div>
        </div>
    </li>
</ul>

<?php }
mysqli_close($conn);
include("footer.php");
?>
