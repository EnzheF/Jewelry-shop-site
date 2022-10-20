<?php
//session_start();
include("header.php");

if(($log=$_SESSION["log"] ?? "") === "");
if(($id=$_SESSION["id"] ?? "") === "");
$message="";
//$log=$_SESSION["log"]; 
//$id=$_SESSION["id"]; 
if (!isset($log))
{
    $success=false; 
    $message = "<tr><td align='center'><b>Вы не авторизованы!!!</b></td></tr>";
}
else
    $success=true; 

print $message; 
    
if ($success)
{
    $conn = mysqli_connect('localhost', 'root', 'root','jewelry');
    $strSQL = "SELECT * FROM customers WHERE id_cust='".$id."'"; 
    $result=mysqli_query($conn, $strSQL) or die("Can't execute query!"); 
    if ($row=mysqli_fetch_array($result))
    {
    ?>
    <div class="auto_content"> 
        <form action=change.php method=post> 
        <tr><td> 
            <h2>Ваши персональные данные</h2> 
            <table border="0" width="100%" align="right"> 
                <tr><td align="right"><i>Фамилия: </i></td><td> 
                <input type=text name=surname value="<?php print $row["surname"] ?>"></td> 
                <td align="right"><i>Имя: </i></td><td> 
                <input type=text name=name_cust value="<?php print $row["name_cust"] ?>"></td> 
                </tr> 
                <tr><td align="right"><i>Aдpec: </i></td><td> 
                <input type=text name=adress value="<?php print $row["adress"]?>"></td> 
                <td align="right"><i>Email: </i></td><td>
                <input type=text name=email value="<?php print $row["email"] ?>"></td></tr>
                <tr><td align="right"><i>Телефон: </i></td><td> 
                <input type=text name=phone_num value="<?php print $row["phone_num"]?>"></td> 
                </tr>
                <tr height="20"></tr>
                <tr><td align="center" colspan="4"> 
                <input class="button" type="submit" value="соxранить"></td></tr>
                <tr height="20"></tr>
                <tr><td align="center" colspan="4"> 
                <a href="exit.php" class="button">Выход</a></td></tr>
                <tr height="20"></tr>
            </table> 
            </form> 
            </td></tr> 
            <tr><td> <h2>Ваши заказы</h2> 
            <?php
            $strSQL1="SELECT id_order, date_order FROM orders WHERE id_cust='".$id."' ORDER BY date_order DESC"; 
            $result1=mysqli_query($conn, $strSQL1) or die("No query1"); 
            while ($row1 = mysqli_fetch_array($result1))
            {
                $order=$row1["id_order"]; 
                $strSQL2="SELECT name_jel, price, material, kolvo, id_order, jewelry.id_jel FROM jewelry, order_jewelry WHERE jewelry.id_jel = order_jewelry.id_jel and id_order='".$order."'"; 
                $result2=mysqli_query($strSQL2) or die("No query2"); 
                ?> 
                <tr><td> 
                <hr> 
                <b>Заказ № <?=$order?> or <?=$row1["date_order"]?><br></b> 
                <table border="1" width="100" align="right"> 
                <tr><td align="right" width="20%"><i>Название: </i></td> 
                <td align="right" width="50"><i>Цена: </i></td> 
                <td align="right" width-"151"><i>Материал: </i></td>                     <td align="right" width="15"><i>Количество: </i></td></tr>

                 <?php
                $sum = 0;
                while($row2 = mysqli_fetch_array($result2))
                {
                ?>
                        <tr>
                            <td><b><?php print $row2["name_jel"]; ?></b></td>
                            <td><?php print $row2["price"]; ?></td>
                            <td><?php print $row2["material"]; ?></td>
                            <td><?php print $row2["kolvo"]; ?></td>
                        </tr>
                <?php $sum = $sum + $row2["price"]*$row2["kolvo"];
                }
                $strSQL3="SELECT name_cat FROM categories, orders WHERE id_order='".$order."'";
                $result3=mysqli_query($conn, $strSQL3) or die("no zapros");
                if($row3=mysqli_fetch_array($result3))
                {?>
                <tr> 
                        <td colspan=2>Free catalog <b>
                        <?php print $row3["name_cat"]; ?></b></td> 
                        <td>0</td> 
                        <td>1</td> 
                </tr> 
                <?php } 
                ?> 
                    <tr><td></td><td align="right"><i>итоro: </i></td> 
                    <td><?php print $sum; ?></td><td></td></tr> 
                    </table> 
                </td></tr> 
                </div>
                <?php
            }
            
    }
mysqli_close($conn);
}
include("footer.php");
?>