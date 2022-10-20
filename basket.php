<?php
include("header.php");

$id_bask = $_COOKIE["id_bask"];

$title = "Your basket";
$conn = mysqli_connect('localhost', 'root', 'root','jewelry');

$strSQL1 = "SELECT COUNT(*) as count FROM basket_jewelry WHERE id_bask='".$id_bask."'";
$result1 = mysqli_query($conn, $strSQL1) or die ("No zopros");
$row = mysqli_fetch_array($result1);

$strSQL1 = "SELECT name_jel, image_jel, image2, price, material, stone, kolvo, id_bask, jewelry.id_jel
FROM jewelry, basket_jewelry WHERE jewelry.id_jel = basket_jewelry.id_jel AND id_bask = '".$id_bask."'";
$result1 = mysqli_query($conn, $strSQL1) or die ("No zapros");

?>
<br><br><br>
<tr>
    <td>
        <table border = "1" width="100%" align="right">
            <tr>
                <td align="left">Название: </td>
                <td align="left">Цена: </td>
                <td align="left">Количество: </td>
                <td></td>
            </tr>
<?php
$sum = 0;
while($row = mysqli_fetch_array($result1))
{
?>
<tr>
    <td><b><?php print $row['name_jel'];?></b></td>
    <td><?php print $row['price'];?>
    <td><?php print $row['kolvo'];?>
    <a href = "dobasket.php?type=1&id_jel=
    <?php print $row['id_jel'];?>" title = "Увеличить">[ + ]</a>
    <a href = "dobasket.php?type=2&id_jel=
    <?php print $row['id_jel'];?>" title = "Уменьшить">[ - ]</a>
    </td>
    <td>
        <a href = "dobasket.php?type=3&id_jel=
    <?php print $row['id_jel'];?>" class="button">Удалить</a>
    </td>
</tr>
<?php
$sum = $sum + $row['price'] * $row['kolvo'];
} ?>
<tr>
    <td align="right"></td>
    <td align="right">ИТОГО: </td>
    <td align="right"><?php print $sum; ?></td>
    <td align="right"></td>
</tr>
</table>
<tr>
    <td><center><a href="dobasket.php?type=4" class="button">
        <b>Очистить корзину</b></a></center></td>
</tr>
<tr>
    <td><center><a href="order.php" class="button">
        <b>Оформить заказ</b></a></center></td>
</tr>
</td></tr>

<?php 
include("footer.php");
?>

